<?php

namespace App\Models;

use App\Models\User;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'order_id', 'id');
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

    public function total_items()
    {
        $order_items = $this->hasMany(OrderItem::class, 'order_id', 'id')->get();
        return count($order_items);
    }

    public function sum_price()
    {
        $order_items = $this->hasMany(OrderItem::class, 'order_id', 'id')->get();

        $order_sum_price = 0;
        foreach ($order_items as $order_item) {
            if ($order_item->product->discount) {
                $order_sum_price += ($order_item->product->price - ($order_item->product->price * $order_item->product->discount / 100)) * $order_item->quantity;
            } else {
                $order_sum_price += $order_item->product->price * $order_item->quantity;
            }
        }

        return $order_sum_price;
    }
}
