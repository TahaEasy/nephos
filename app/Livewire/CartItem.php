<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Cookie;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class CartItem extends Component
{
    use WireToast;

    public int $index;
    public int $quantity;
    public $product;
    public $item;

    public function mount()
    {
        $this->quantity = $this->item->quantity;
        $this->product = $this->item->product;

        if (!auth()->check()) {
            $saved_items = json_decode(Cookie::get('cart_items'));
            $this->index = -1;

            foreach ($saved_items as $key => $saved_item) {
                if ($saved_item->product_id == $this->product->id) {
                    $this->index = $key;
                }
            }
        }
    }

    public function increaseQuantity()
    {
        $this->quantity++;

        if (auth()->check()) {
            $this->item->quantity = $this->quantity;
            $this->item->save();
        } else {
            $saved_items = json_decode(Cookie::get('cart_items'));

            if ($this->index == -1) {
                toast()->danger('متاسفانه محصول مورد نظر پیدا نشد!', 'خطا!')->push();
            } else {
                array_splice($saved_items, $this->index, 1);
                $saved_items[$this->index] = new CartItem();
                $saved_items[$this->index]->quantity = $this->quantity;
                $saved_items[$this->index]->product_id = $this->product->id;

                cookie()->queue(cookie()->forever('cart_items', json_encode($saved_items)));
            }
        }
        $this->dispatch('refresh-shop-menu');
    }
    public function decreaseQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;

            if (auth()->check()) {
                $this->item->quantity = $this->quantity;
                $this->item->save();
            } else {
                $saved_items = json_decode(Cookie::get('cart_items'));

                if ($this->index == -1) {
                    toast()->danger('متاسفانه محصول مورد نظر پیدا نشد!', 'خطا!')->push();
                } else {
                    array_splice($saved_items, $this->index, 1);
                    $saved_items[$this->index] = new CartItem();
                    $saved_items[$this->index]->quantity = $this->quantity;
                    $saved_items[$this->index]->product_id = $this->product->id;

                    cookie()->queue(cookie()->forever('cart_items', json_encode($saved_items)));
                }
            }
        }
        $this->dispatch('refresh-shop-menu');
    }

    public function delete_cart_item()
    {
        if (auth()->check()) {
            $this->item->delete();

            toast()->success('کالا با موفقیت از سبد خرید شما حذف شد!', 'موفق!')->push();
        } else {
            $saved_items = json_decode(Cookie::get('cart_items'));

            if ($this->index == -1) {
                toast()->danger('متاسفانه محصول مورد نظر پیدا نشد!', 'خطا!')->push();
            } else {
                array_splice($saved_items, $this->index, 1);
                cookie()->queue(cookie()->forever('cart_items', json_encode($saved_items)));
                toast()->success('کالا با موفقیت از سبد خرید شما حذف شد!', 'موفق!')->push();
            }
        }
        $this->dispatch('refresh-shop-menu');
        $this->dispatch('refresh');
    }

    public function render()
    {
        return view('livewire.cart-item');
    }
}
