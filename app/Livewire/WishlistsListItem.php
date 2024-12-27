<?php

namespace App\Livewire;

use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class WishlistsListItem extends Component
{
    use WireToast;

    protected $listeners = [
        'refresh' => 'refresh',
        'change-current-index' => 'change_current_index'
    ];

    public $wishlist;
    public $index;
    public $total_wishlist_items;
    public $current_index = 0;

    public bool $isItemLoading = false;

    public function mount()
    {
        $this->total_wishlist_items = $this->wishlist->total_wishlist_items();
        $first_wishlist = auth()->user()->first_wishlist;
        if ($first_wishlist) {
            $this->current_index = $first_wishlist->id;
        }
    }

    public function delete_wishlist()
    {
        $this->wishlist->delete();
        toast()->success('لیست علاقه مندی با موفقیت حذف شد!', 'موفق!')->push();
        $this->dispatch('refresh');
        $this->dispatch('check-first-wishlist');
    }

    public function select_wishlist($id)
    {
        $this->dispatch('select-wishlist-items', wishlist: $id);
        $this->isItemLoading = true;
    }

    public function change_current_index($index)
    {
        $this->current_index = $index;
        $this->isItemLoading = false;
    }

    public function refresh()
    {
        $this->total_wishlist_items = $this->wishlist->total_wishlist_items();
    }

    public function render()
    {
        return view('livewire.wishlists-list-item');
    }
}
