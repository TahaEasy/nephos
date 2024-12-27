<?php

namespace App\Livewire;

use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class CartPageItem extends Component
{
    use WireToast;
    public int $quantity;
    public $cart_item;

    public function mount()
    {
        $this->quantity = $this->cart_item->quantity;
    }

    public function increaseQuantity()
    {
        $this->quantity++;

        $this->cart_item->quantity = $this->quantity;
        $this->cart_item->save();
        $this->dispatch('refresh-cart-page');
    }
    public function decreaseQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;

            $this->cart_item->quantity = $this->quantity;
            $this->cart_item->save();
            $this->dispatch('refresh-cart-page');
        }
    }

    public function delete_cart_item()
    {
        $this->cart_item->delete();
        $this->dispatch('refresh-cart-page');
        toast()->success('کالا با موفقیت از سبد خرید شما حذف شد!', 'موفق!')->push();
        $this->dispatch('refresh');
    }

    public function render()
    {
        return view('livewire.cart-page-item');
    }
}
