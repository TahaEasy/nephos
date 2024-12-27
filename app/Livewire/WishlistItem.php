<?php

namespace App\Livewire;

use App\Models\CartItem;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class WishlistItem extends Component
{
    use WireToast;

    public $wishlist_item;

    public function add_to_cart()
    {
        $cartItem = new CartItem();
        $cartItem->quantity = 1;
        $cartItem->cart_id = auth()->user()->cart->id;
        $cartItem->product_id = $this->wishlist_item->product->id;

        if ($this->wishlist_item->product->is_added_to_cart()) {
            return toast()->warning('این کالا قبلا به سبد خرید اضافه شده!', 'هشدار!')->push();
        }

        $cartItem->save();
        toast()->success('کالا با موفقیت به سبد خرید شما اضافه شد!', 'موفق!')->push();
        $this->dispatch('refresh-shop-menu');
        $this->dispatch('refresh');
    }

    public function delete_wishlist_item()
    {
        $this->wishlist_item->delete();
        toast()->success('کالا با موفقیت از لیست حذف شد!', 'موفق!')->push();
        $this->dispatch('refresh');
    }

    public function render()
    {
        return view('livewire.wishlist-item');
    }
}
