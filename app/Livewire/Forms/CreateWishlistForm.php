<?php

namespace App\Livewire\Forms;


use App\Models\Wishlist;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Usernotnull\Toast\Concerns\WireToast;

class CreateWishlistForm extends Component
{
    use WireToast;

    #[Validate('required', message: 'لطفا چیزی در کادر بنویسید!')]
    #[Validate('min:3')]
    #[Validate('max:30')]
    public $title = '';

    public function save_wishlist_item()
    {
        if (auth()->user()?->is_admin()) {
            return toast()->warning('حساب ادمین نمیتواند از لیست علاقه مندی استفاده کند!', 'هشدار!')->push();
        }
        $this->validate();

        $newWishlist = new Wishlist();
        $newWishlist->title = $this->title;
        $newWishlist->user_id = auth()->id();
        $newWishlist->save();

        $this->title = '';

        toast()->success('لیست علاقه مندی با موفقیت ساخته شد!', 'موفق!')->push();
        $this->dispatch('refresh');
    }

    public function render()
    {
        return view('livewire.forms.create-wishlist-form');
    }
}
