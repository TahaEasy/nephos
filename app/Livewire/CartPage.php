<?php

namespace App\Livewire;

use Livewire\Component;

class CartPage extends Component
{
    protected $listeners = [
        'refresh-cart-page' => 'refresh_component',
    ];

    public $cart_items;

    public $sum_price;
    public $taxes;
    public $shipping_price = 50000;
    public $total_price;

    public function mount()
    {
        $this->sum_price = auth()->user()->cart->sum_price();
        $this->taxes = $this->sum_price * 9 / 100;
        $this->total_price = $this->sum_price + $this->taxes + $this->shipping_price;
    }

    public function render()
    {
        return view('livewire.cart-page');
    }

    public function refresh_component()
    {
        $this->sum_price = auth()->user()->cart->sum_price();
        $this->taxes = $this->sum_price * 9 / 100;
        $this->total_price = $this->sum_price + $this->taxes + $this->shipping_price;
        $this->dispatch('refresh');
    }
}
