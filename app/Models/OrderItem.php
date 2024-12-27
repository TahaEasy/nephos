<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function total_price()
    {
        return ($this->product->price - ($this->product->price * $this->product->discount / 100)) * $this->quantity;
    }

    use HasFactory;
}
