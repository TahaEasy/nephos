<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use App\Models\Wishlist;
use App\Models\WishlistItem;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class CreateWishlistItemForm extends Component
{
    use WireToast;

    protected $listeners = ['select-product' => 'select_product'];

    #[Validate('required', message: 'متاسفانه محصول مورد نظر یافت نشد!')]
    public $selected_product_id;

    #[Validate('required', message: 'لطفا یکی از لیست ها را انتخاب کنید!')]
    public $selected_wishlist_id;

    public function select_product(int $id)
    {
        $this->selected_product_id = $id;
    }

    public function add_wishlist_item()
    {
        if (auth()->user()?->is_admin()) {
            return toast()->warning('حساب ادمین نمیتواند از لیست علاقه مندی استفاده کند!', 'هشدار!')->push();
        }
        $this->validate();

        // check if wishlist exists
        if (Wishlist::find($this->selected_wishlist_id)) {
            // check if product exists
            if (Product::find($this->selected_product_id)) {
                // check if this new wishlist item has already been added
                if (count(WishlistItem::where('wishlist_id', '=', $this->selected_wishlist_id)->where('product_id', '=', $this->selected_product_id)->get() ?? 0)) {
                    return toast()->warning('این کالا قبلا به این لیست علاقه مندی اضافه شده!', 'هشدار!')->push();
                }
            } else {
                return toast()->danger('محصول مورد نظر پیدا نشد!', 'خطا!')->push();
            }
        } else {
            return toast()->danger('لیست علاقه مندی پیدا نشد!', 'خطا!')->push();
        }

        $newWishlistItem = new WishlistItem();
        $newWishlistItem->wishlist_id = $this->selected_wishlist_id;
        $newWishlistItem->product_id = $this->selected_product_id;
        $newWishlistItem->save();

        toast()->success('محصول مورد نظر با موفقیت به لیست علاقه مندی اضافه شد!', 'موفق!')->push();
        $this->dispatch('refresh');
    }

    public function render()
    {
        return view('livewire.forms.create-wishlist-item-form');
    }
}
