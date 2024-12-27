<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Wishlist;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Gate;
use Mchev\Banhammer\Traits\Bannable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Bannable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        // --> details
        'f_name',
        'l_name',
        'email',
        'password',
        'phone',
        'avatart',
        // --> address
        'province',
        'city',
        'street',
        'alley',
        'plaque',
        'post_code',
    ];

    public function products()
    {
        if ($this->is_seller && !$this?->is_admin()) {
            return $this->hasMany(Product::class, 'user_id', 'id');
        } else {
            return [];
        }
    }

    public function cart()
    {
        return $this->hasOne(Cart::class, 'user_id', 'id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class, 'user_id', 'id');
    }

    public function first_wishlist()
    {
        return $this->hasOne(Wishlist::class, 'user_id', 'id')->oldest();
    }

    public function last_wishlist()
    {
        return $this->hasOne(Wishlist::class, 'user_id', 'id')->latest();
    }

    public function name()
    {
        return $this->f_name . ' ' . $this->l_name;
    }

    public function is_admin()
    {
        return Gate::allows('is_admin');
    }
    public function is_seller()
    {
        return Gate::allows('is_seller');
    }

    public function is_address_incomplete()
    {
        if (
            !$this->province ||
            !$this->city ||
            !$this->street ||
            !$this->alley ||
            !$this->plaque ||
            !$this->post_code ||
            !$this->phone
        ) {
            return true;
        }
        return false;
    }

    public function unseen_messages()
    {
        return $this->hasMany(Message::class)->where('is_seen', '=', 0)->orderBy('created_at');
    }

    public function seen_messages()
    {
        return $this->hasMany(Message::class)->where('is_seen', '=', 1)->orderBy('created_at');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
