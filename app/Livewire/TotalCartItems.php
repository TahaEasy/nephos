<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class TotalCartItems extends Component
{
    protected $listeners = ['refresh' => 'refresh'];
    public $total_cart_items = 0;

    public function mount()
    {
        if (auth()->check()) {
            $this->total_cart_items = auth()->user()->cart->total_items();
        } else {
            $cart_items = json_decode(Cookie::get('cart_items'));

            if ($cart_items != null) {
                $this->total_cart_items = count($cart_items);
            } else {
                $this->total_cart_items = 0;
            }
        }
    }

    public function refresh()
    {
        if (auth()->check()) {
            $this->total_cart_items = auth()->user()->cart->total_items();
        } else {
            $cart_items = json_decode(Cookie::get('cart_items'));

            if ($cart_items != null) {
                $this->total_cart_items = count($cart_items);
            } else {
                $this->total_cart_items = 0;
            }
        }
    }

    public function render()
    {
        return view('livewire.total-cart-items');
    }
}
