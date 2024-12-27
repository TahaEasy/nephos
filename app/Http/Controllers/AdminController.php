<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Scopes\ProductConfirmedScope;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Usernotnull\Toast\Concerns\WireToast;

class AdminController extends Controller
{
    use WireToast;

    public function orders()
    {
        return view('dashboard.admin.manage-orders');
    }

    public function users()
    {
        return view('dashboard.admin.manage-users');
    }

    public function comments()
    {
        return view('dashboard.admin.manage-comments');
    }

    public function products()
    {
        return view('dashboard.admin.manage-products');
    }

    public function edit_products($slug)
    {
        $product = Product::withoutGlobalScope(ProductConfirmedScope::class)->where('slug', '=', $slug)->first();

        return view('dashboard.admin.edit-products', compact('product'));
    }

    public function user_dashboard(User $user)
    {
        return view('dashboard.admin.user.dashboard', compact('user'));
    }

    # spectator pages:
    public function user_edit(User $user)
    {
        return view('dashboard.admin.user.edit', compact('user'));
    }

    public function user_update(Request $request, User $user)
    {
        $data = $request->validate([
            'f_name' => 'required|min:3',
            'l_name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $user->id,
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
                Storage::disk("local")->delete("public/avatars/{$oldAvatar}");
            }
        }

        toast()->success('تغییرات حساب کاربر با موفقیت ذخیره شد!', 'موفق!')->pushOnNextPage();
        message('warning', 'حساب شما ویرایش شد!', 'اطلاعات حساب شما توسط یکی از ادمین های سایت ویرایش شد.', $user->id);
        return redirect()->route('admin.user.dashboard', ['user' => $user->id]);
    }

    public function user_orders(User $user)
    {
        return view('dashboard.admin.user.orders', compact('user'));
    }

    public function user_comments(User $user)
    {
        return view('dashboard.admin.user.comments', compact('user'));
    }

    public function user_products(User $user)
    {
        return view('dashboard.admin.user.products', compact('user'));
    }
}
