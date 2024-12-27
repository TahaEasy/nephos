<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Scopes\ProductConfirmedScope;
use App\Models\Wishlist;
use App\Models\WishlistItem;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Pishran\LaravelPersianSlug\HasPersianSlug;
use Spatie\Sluggable\SlugOptions;

#[ScopedBy([ProductConfirmedScope::class])]
class Product extends Model
{
    use HasPersianSlug;
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'category',
        'discount',
        'image',
        'price',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'product_id', 'id')->where('confirmed_at', '!=', null);
    }

    public function discount_price()
    {
        if ($this->discount > 0) {
            return $this->price - ($this->price * $this->discount / 100);
        } else {
            return 0;
        }
    }

    public function avg_rate()
    {
        $avg_rate = 0;


        $ratings = [];
        foreach ($this->comments as $comment) {
            $ratings[] = $comment->rating;
        }

        if (count($ratings) != 0) {
            $avg_rate = array_sum($ratings) / count($ratings);
        } else {
            $avg_rate = 0;
        }

        $avg_rate = round($avg_rate, 1);

        return $avg_rate;
    }

    public function total_rates()
    {
        $total_rates = 0;

        foreach ($this->comments as $comment) {
            $total_rates++;
        }

        return $total_rates;
    }

    public function is_added_to_cart()
    {
        $items = CartItem::where('product_id', '=', $this->id)->where('cart_id', '=', auth()->user()->cart->id)->get();

        return count($items) > 0;
    }

    public function is_added_to_wishlist()
    {
        $is_added_to_wishlist = false;

        $wishlist_items = WishlistItem::where('product_id', '=', $this->id)->get();

        foreach ($wishlist_items as $wishlist_item) {
            $wishlist = Wishlist::find($wishlist_item->wishlist_id);
            if ($wishlist->user->id == auth()->id()) {
                $is_added_to_wishlist = true;
            }
        }

        return $is_added_to_wishlist;
    }

    public function total_hearts()
    {
        $total_hearts = 0;
        $wishlist_items = WishlistItem::all();

        foreach ($wishlist_items as $wishlist_item) {
            if ($wishlist_item->product_id == $this->id) {
                $total_hearts++;
            }
        }

        return $total_hearts;
    }
}
