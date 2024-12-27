<?php

namespace App\Models;

use App\Models\User;
use App\Models\Product;
use App\Models\Scopes\CommentConfirmedScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ScopedBy([CommentConfirmedScope::class])]
class Comment extends Model
{
    protected $fillable = [
        'content',
        'rating'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    use HasFactory;
}
