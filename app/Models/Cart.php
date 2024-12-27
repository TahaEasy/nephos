<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    public function cart_items()
    {
        return $this->hasMany(CartItem::class, 'cart_id', 'id');
    }

    public function total_items()
    {
        $cart_items = $this->hasMany(CartItem::class, 'cart_id', 'id')->get();
        return count($cart_items);
    }

    public function sum_price()
    {
        $cart_items = $this->hasMany(CartItem::class, 'cart_id', 'id')->get();

        $cart_sum_price = 0;
        foreach ($cart_items as $cart_item) {
            if ($cart_item->product->discount) {
                $cart_sum_price += ($cart_item->product->price - ($cart_item->product->price * $cart_item->product->discount / 100)) * $cart_item->quantity;
            } else {
                $cart_sum_price += $cart_item->product->price * $cart_item->quantity;
            }
        }

        return $cart_sum_price;
    }

    use HasFactory;
}
