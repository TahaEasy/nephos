<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Scopes\ProductConfirmedScope;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function getAvatar(User $user)
    {
        $path = storage_path('app/public/avatars/') . $user->avatar;

        if (!File::exists($path) || !$user->avatar) {
            $path = public_path('img/fallback-avatar.png');
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

    public function login_page()
    {
        return view('auth.login');
    }
    public function regiser_page()
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'remember' => 'nullable'
        ]);

        $remember = isset($data['remember']);

        if (auth()->attempt(['email' => $data['email'], 'password' => $data['password']], $remember)) {
            $request->session()->regenerate();
            if (auth()->user()->isBanned()) {
                auth()->logout();
                toast()->danger('حساب کاربری شما مسدود شده است، لطفا بعدا تلاش کنید.', 'خطا!')->pushOnNextPage();
                return redirect()->back();
            }

            $saved_items = json_decode(Cookie::get('cart_items'));

            if ($saved_items != null) {
                foreach ($saved_items as $item) {
                    $new_cart_item = new CartItem();
                    $new_cart_item->cart_id = auth()->user()->cart->id;
                    $new_cart_item->product_id = $item->product_id;
                    $new_cart_item->quantity = $item->quantity;
                    $new_cart_item->save();
                }
                cookie()->queue(cookie()->forget('cart_items'));
            }

            toast()->success('شما با موفقیت وارد حساب خود شدید!', 'موفق!')->pushOnNextPage();
            if (auth()->user()?->is_admin()) {
                return redirect()->route('admin.orders');
            } else {
                return redirect()->route('dashboard');
            }
        } else {
            toast()->danger('ایمیل یا رمز عبور وارد شده صحیح نمی باشند!', 'خطا!')->pushOnNextPage();
            return redirect()->route('login');
        }
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:users,email',
            'f_name' => 'required|min:3',
            'l_name' => 'required|min:3',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = new User;
        $user->f_name = $data['f_name'];
        $user->l_name = $data['l_name'];
        $user->email = $data['email'];
        $user->password = $data['password'];


        $user->save();
        auth()->login($user);

        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->save();

        toast()->success('حساب کاربری شما با موفقیت ساخته شد!', 'خوش آمدید!')->pushOnNextPage();
        return redirect()->route('dashboard');
    }

    public function logout()
    {
        auth()->logout();

        toast()->success('شما با موفقیت از حساب خود خارج شدید!', 'موفق!')->pushOnNextPage();
        return redirect('/');
    }

    public function dashboard()
    {
        $user = auth()->user();

        if (auth()->user()?->is_admin()) {
            return redirect()->route('admin.orders');
        }

        return view('dashboard.account', ['user' => $user]);
    }

    public function wishlist_page()
    {
        $user = auth()->user();
        return view('dashboard.wishlist', ['user' => $user]);
    }

    public function checkout_page()
    {
        $cart_items = auth()->user()->cart->cart_items;

        if (count($cart_items ?? 0)) {
            return view('dashboard.checkout');
        } else {
            return back();
        }
    }

    public function cart_page()
    {
        $cart_items = auth()->user()->cart->cart_items;

        $user = auth()->user();
        return view('dashboard.cart', ['user' => $user, 'cart_items' => $cart_items]);
    }

    public function orders_page()
    {
        $user = auth()->user();
        return view('dashboard.orders', ['user' => $user]);
    }

    public function create_product()
    {
        return view('dashboard.create-product');
    }

    public function store_product(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:30|min:3',
            'price' => 'required|numeric|gt:0|multiple_of:500|min:5000|max:200000000',
            'description' => 'required|min:30',
            'category' => 'required',
            'image' => 'file|image|nullable|max:2100'
        ], [
            'image.image' => 'فایل آپلود شده باید عکس (...,jpg, jpeg, png) باشد!',
            'image.max' => 'اندازه عکس نباید بیشتر از 2 مگابایت باشد!',
            'price.gt' => 'قیمت محصول نمیتواند صفر یا کمتر باشد',
            'price.multiple_of' => 'قیمت محصول باید بر 500 بخش پذیر باشد',
            'price.min' => 'حداقل قیمت 50,000 تومان میباشد',
            'price.max' => 'حداکثر قیمت 200,000,000 تومان میباشد',
            'category.required' => 'حتما یک دسته بندی انتخاب کنید',
        ]);

        $newProduct = new Product();
        $newProduct->name = $data['name'];
        $newProduct->price = $data['price'];
        $newProduct->description = strip_tags(nl2br($data['description']), '<br>');
        $newProduct->category = $data['category'];
        $newProduct->discount = 0;

        if (isset($data['image'])) {
            if ($data['image'] != '') {
                $user = auth()->user();
                if (isset($request->base64_image)) {
                    $base64_image = $request->base64_image;
                    list($type, $data) = explode(';', $base64_image);
                    list(, $data) = explode(',', $data);
                    $data = base64_decode($data);

                    $fileName = $user->id . '-' . uniqid() . '.jpeg';

                    Storage::disk("local")->put('public/products/' . $fileName, $data);

                    $newProduct->image = $fileName;
                }
            } else {
                $newProduct->image = '';
            }
        } else {
            $newProduct->image = '';
        }
        $newProduct->user_id = auth()->id();

        $newProduct->save();

        toast()->info('محصول شما ایجاد و بعد بررسی ادمین ها به سایت اضافه میشود.', 'موفق!')->pushOnNextPage();
        return redirect()->route('create-product');
    }

    public function edit_product(Product $product)
    {
        return view('dashboard.edit-product', compact('product'));
    }

    public function update_product(Request $request, $slug)
    {
        $product = Product::withoutGlobalScope(ProductConfirmedScope::class)->where('slug', '=', $slug)->first();

        $data = $request->validate([
            'name' => 'required|max:30|min:3',
            'price' => 'required|numeric|gt:0|multiple_of:500|min:5000|max:200000000',
            'description' => 'required|min:30',
            'category' => 'required',
            'image' => 'file|image|nullable|max:2100',
            'discount' => 'numeric|gte:0|max:100|min:0|nullable'
        ], [
            'discount.min' => 'مقدار تخفیف باید حداقل 0 باشد!',
            'discount.max' => 'مقدار تخفیف نباید بیشتر از 100 باشد!',
            'discount.gte' => 'مقدار تخفیف نباید کمتر از 0 باشد!',
            'image.image' => 'فایل آپلود شده باید عکس (...,jpg, jpeg, png) باشد!',
            'image.max' => 'اندازه عکس نباید بیشتر از 2 مگابایت باشد!',
            'price.gt' => 'قیمت محصول نمیتواند صفر یا کمتر باشد',
            'price.multiple_of' => 'قیمت محصول باید بر 500 بخش پذیر باشد',
            'price.min' => 'حداقل قیمت 5,000 تومان میباشد',
            'price.max' => 'حداکثر قیمت 200,000,000 تومان میباشد',
            'category.required' => 'حتما یک دسته بندی انتخاب کنید',
        ]);

        $product->name = $data['name'];
        $product->price = $data['price'];
        $product->description = strip_tags(nl2br($data['description']), '<br>');
        $product->category = $data['category'];

        if (isset($data['discount'])) {
            if ($data['discount'] != null) {
                $product->discount = $data['discount'];
            } else {
                $product->discount = 0;
            }
        } else {
            $product->discount = 0;
        }

        if (isset($data['image'])) {
            if ($data['image'] != '') {
                $user = auth()->user();
                if (isset($request->base64_image)) {
                    $base64_image = $request->base64_image;
                    list($type, $data) = explode(';', $base64_image);
                    list(, $data) = explode(',', $data);
                    $data = base64_decode($data);

                    $fileName = $user->id . '-' . uniqid() . '.jpeg';

                    Storage::disk("local")->delete("public/products/{$product->image}");
                    Storage::disk("local")->put('public/products/' . $fileName, $data);

                    $product->image = $fileName;
                }
            }
        }

        $product->update();

        toast()->success('کالا شما با موفقیت بروز رسانی شد!', 'موفق!')->pushOnNextPage();

        if (auth()->user()->is_admin) {
            message('info', 'محصول شما ویرایش شد!', 'محصول شما با نام «' . $product->name . '» از طرف ادمین ویرایش شد.', $product->user->id);

            return redirect()->route('admin.products');
        } else {
            return redirect()->route('create-product');
        }
    }

    public function edit()
    {
        $user = auth()->user();
        return view('dashboard.edit-account', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'f_name' => 'required|min:3',
            'l_name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'phone' => 'nullable|min:11|max:11',
            'province' => 'nullable|min:2',
            'city' => 'nullable|min:2',
            'street' => 'nullable|min:2',
            'alley' => 'nullable|min:2',
            'plaque' => 'nullable|min:2',
            'post_code' => 'nullable|min:2',
            'avatar' => 'nullable|file|image|max:2100'
        ], [
            'avatar.image' => 'فایل آپلود شده باید عکس (...,jpg, jpeg, png) باشد!',
            'avatar.max' => 'اندازه عکس نباید بیشتر از 2 مگابایت باشد!',
        ]);

        $user = auth()->user();
        if (isset($request->base64_image)) {
            $base64_image = $request->base64_image;
            list($type, $data) = explode(';', $base64_image);
            list(, $data) = explode(',', $data);
            $data = base64_decode($data);

            $fileName = $user->id . '-' . uniqid() . '.jpeg';

            Storage::disk("local")->put('public/avatars/' . $fileName, $data);

            $oldAvatar = $user->avatar;

            $user->avatar = $fileName;
        }
        $user->f_name = $request->f_name;
        $user->l_name = $request->l_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->province = $request->province;
        $user->city = $request->city;
        $user->street = $request->street;
        $user->alley = $request->alley;
        $user->plaque = $request->plaque;
        $user->post_code = $request->post_code;
        $user->update();

        if (isset($request->base64_image)) {
            if ($oldAvatar) {
                Storage::disk('local')->delete("public/avatars/{$oldAvatar}");
            }
        }

        toast()->success('تغییرات حساب شما با موفقیت ذخیره شد!', 'موفق!')->pushOnNextPage();
        return redirect()->route('dashboard');
    }
}
