<?php

namespace App\Livewire;

use App\Models\CartItem;
use Illuminate\Support\Facades\Cookie;
use Livewire\Component;

class ShopMenu extends Component
{
    protected $listeners = [
        'refresh-shop-menu' => 'refreshComponent',
    ];
    public $cookie_items_exist;
    public $cart_items;
    public int $cart_total_price = 0;

    public function mount()
    {
        if (auth()->check()) {
            $this->cart_items = auth()->user()->cart->cart_items;
        } else {
            $this->cookie_items_exist = Cookie::get('cart_items') && count((array) json_decode(Cookie::get('cart_items'))) > 0;
            $all_items = json_decode(Cookie::get('cart_items'));
            $new_cart_items = [];
            if ($all_items !== null) {

                foreach ($all_items as $item) {
                    $new_cart_item = new CartItem();
                    $new_cart_item->quantity = $item->quantity;
                    $new_cart_item->product_id = $item->product_id;

                    $new_cart_items[] = $new_cart_item;
                }
            }
            $this->cart_items = $new_cart_items;
        }

        $this->update_price();
    }

    public function update_price()
    {
        $this->cart_total_price = 0;

        foreach ($this->cart_items as $cart_item) {
            if ($cart_item->product->discount) {
                $this->cart_total_price += ($cart_item->product->price - ($cart_item->product->price * $cart_item->product->discount / 100)) * $cart_item->quantity;
            } else {
                $this->cart_total_price += $cart_item->product->price * $cart_item->quantity;
            }
        }
    }

    public function render()
    {
        return view('livewire.shop-menu');
    }

    public function refreshComponent()
    {
        if (auth()->check()) {
            $this->cart_items = auth()->user()->cart->cart_items;
        } else {
            $new_cart_items = [];
            $this->cookie_items_exist = Cookie::get('cart_items') && count((array) json_decode(Cookie::get('cart_items'))) > 0;
            $all_items = json_decode(Cookie::get('cart_items'));

            if ($all_items !== null) {
                foreach ($all_items as $item) {
                    $new_cart_item = new CartItem();
                    $new_cart_item->quantity = $item->quantity;
                    $new_cart_item->product_id = $item->product_id;

                    $new_cart_items[] = $new_cart_item;
                }
            }
            $this->cart_items = $new_cart_items;
        }

        $this->update_price();
    }
}
