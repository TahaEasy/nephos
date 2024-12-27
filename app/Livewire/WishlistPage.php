<?php

namespace App\Livewire;

use App\Models\Wishlist;
use Livewire\Component;

class WishlistPage extends Component
{
    protected $listeners = [
        'refresh' => 'refresh',
        'select-wishlist-items' => 'show_wishlist_items',
        'check-first-wishlist' => 'check_first_wishlist',
    ];

    public $wishlists;
    public $wishlist_items;

    public function mount()
    {
        $this->wishlists = auth()->user()->wishlists;

        $first_wishlist = auth()->user()->first_wishlist;
        if ($first_wishlist) {
            $this->wishlist_items = $first_wishlist->wishlist_items ?? [];
        }
    }

    public function show_wishlist_items(Wishlist $wishlist)
    {
        $this->wishlist_items = $wishlist->wishlist_items ?? [];
        $this->dispatch('change-current-index', index: $wishlist->id);
    }

    public function check_first_wishlist()
    {
        $this->wishlists = auth()->user()->wishlists;

        $first_wishlist = auth()->user()->first_wishlist;
        if ($first_wishlist) {
            $this->wishlist_items = $first_wishlist->wishlist_items ?? [];
            $this->dispatch('change-current-index', index: $first_wishlist->id);
        } else {
            $this->wishlist_items = null;
        }
    }

    public function refresh()
    {
        $this->wishlists = auth()->user()->wishlists;
    }

    public function render()
    {
        return view('livewire.wishlist-page');
    }
}
