<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CartItem;
use Illuminate\Support\Facades\Cookie;
use Livewire\Attributes\Reactive;
use Usernotnull\Toast\Concerns\WireToast;

class Product extends Component
{
    use WireToast;

    #[Reactive]
    public $productStyle = '';
    public $isBlockStyle = false;
    public $product;

    public function add_cart_item()
    {
        if (auth()->user()?->is_admin()) {
            return toast()->warning('حساب ادمین نمیتواند از سبد خرید استفاده کند!', 'هشدار!')->push();
        }
        if (auth()->check()) {
            $cartItem = new CartItem();
            $cartItem->quantity = 1;
            $cartItem->cart_id = auth()->user()->cart->id;
            $cartItem->product_id = $this->product->id;

            if ($this->product->is_added_to_cart()) {
                return toast()->warning('این کالا قبلا به سبد خرید اضافه شده!', 'هشدار!')->push();
            }

            $cartItem->save();
            toast()->success('کالا با موفقیت به سبد خرید شما اضافه شد!', 'موفق!')->push();
            $this->dispatch('refresh-shop-menu');
            $this->dispatch('refresh');
        } else {
            $saved_items = json_decode(Cookie::get('cart_items'));

            $item = new CartItem();
            $item->quantity = 1;
            $item->product_id = $this->product->id;

            if ($saved_items !== null && count($saved_items) > 0) {
                $is_added_to_cart = false;

                foreach ($saved_items as $saved_item) {
                    if ($saved_item->product_id == $item->product_id) {
                        $is_added_to_cart = true;
                    }
                }

                if ($is_added_to_cart) {
                    return toast()->warning('این کالا قبلا به سبد خرید اضافه شده!', 'هشدار!')->push();
                }

                array_push($saved_items, $item);

                cookie()->queue(cookie('cart_items', json_encode($saved_items)));
            } else {
                $saved_items[] = $item;

                cookie()->queue(cookie()->forever('cart_items', json_encode($saved_items)));
            }

            toast()->success('کالا با موفقیت به سبد خرید شما اضافه شد!', 'موفق!')->push();
        }
        $this->dispatch('refresh-shop-menu');
        $this->dispatch('refresh');
    }

    public function select_product()
    {
        if (auth()->check()) {
            $this->dispatch('select-product', id: $this->product->id);
        } else {
            toast()->info('برای استفاده از لیست علاقه مندی نیاز به حساب کاربری دارید!', 'توجه!')->push();
        }
    }

    public function adminsCantLike()
    {
        return toast()->warning('حساب های ادمین اجازه استفاده از لیست علاقه مندی را ندارند!', 'هشدار!')->push();
    }

    public function loginBro()
    {
        return toast()->warning('برای استفاده از لیست علاقه مندی نیاز به حساب کاربری دارید!', 'هشدار!')->push();
    }

    public function render()
    {
        $this->isBlockStyle = $this->productStyle == 'block';
        return view('livewire.product');
    }
}
