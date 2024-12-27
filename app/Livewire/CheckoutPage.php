<?php

namespace App\Livewire;

use Livewire\Component;

class CheckoutPage extends Component
{
    public $cart_items;
    public $sum_price;
    public $taxes;
    public $shipping_price = 50000;
    public $total_price;
    public $accept = false;

    public function mount()
    {
        $this->cart_items = auth()->user()->cart->cart_items;
        $this->sum_price = auth()->user()->cart->sum_price();
        $this->taxes = $this->sum_price * 9 / 100;
        $this->total_price = $this->sum_price + $this->taxes + $this->shipping_price;
    }

    public function accepted()
    {
        $this->accept = !$this->accept;
    }

    public function render()
    {
        return view('livewire.checkout-page');
    }
}
