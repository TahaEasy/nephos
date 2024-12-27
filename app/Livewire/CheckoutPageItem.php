<?php

namespace App\Livewire;

use Livewire\Component;

class CheckoutPageItem extends Component
{
    public $cart_item;
    public $total_price;

    public function mount()
    {
        $product_price = $this->cart_item->product->price;
        $this->total_price = ($product_price - ($product_price * $this->cart_item->product->discount / 100)) * $this->cart_item->quantity;
    }

    public function render()
    {
        return view('livewire.checkout-page-item');
    }
}
