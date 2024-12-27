<?php

namespace App\Models;

use App\Models\User;
use App\Models\WishlistItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wishlist extends Model
{
    protected $fillable = ['title'];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function wishlist_items()
    {
        return $this->hasMany(WishlistItem::class, 'wishlist_id', 'id')->orderByDesc('id');
    }

    public function total_wishlist_items()
    {
        $total_items = $this->wishlist_items;
        return count($total_items);
    }
}
