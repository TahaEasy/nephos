<?php

namespace App\Livewire\Admin\User;

use App\Models\Product;
use App\Models\Scopes\ProductConfirmedScope;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Usernotnull\Toast\Concerns\WireToast;

class Products extends Component
{
    use WireToast;
    use WithPagination;
    use WithoutUrlPagination;

    public User $user;

    public string $selectedStatus = 'all';
    public string $selectedOrderBy = 'updated_at';
    public string $selectedCategory = 'all';
    public string $searchName = '';
    public string $searchId = '';

    public function render()
    {
        $statuses = ["all", "deleted",];
        if (!in_array($this->selectedStatus, $statuses)) {
            $this->selectedStatus = 'all';
        }

        $orderBys = ["updated_at", "created_at", "id",];
        if (!in_array($this->selectedOrderBy, $orderBys)) {
            $this->selectedOrderBy = 'updated_at';
        }

        $categories = ["all", "house", "office", "kitchen", "kids", "accessories"];
        if (!in_array($this->selectedCategory, $categories)) {
            $this->selectedCategory = 'all';
        }

        if ($this->selectedStatus === 'all') {
            if (trim($this->searchId)) {
                $products = Product::where('user_id', '=', $this->user->id)->where('id', '=', trim($this->searchId))->where('name', 'like', '%' . trim($this->searchName) . '%')->where('category', 'like', $this->selectedCategory === 'all' ? "%%" : "%" . $this->selectedCategory . "%")->orderByDesc($this->selectedOrderBy)->where('confirmed_at', '!=', null)->paginate(6);
                $this->searchName = '';
            } else {
                $products = Product::where('user_id', '=', $this->user->id)->where('name', 'like', '%' . trim($this->searchName) . '%')->where('category', 'like', $this->selectedCategory === 'all' ? "%%" : "%" . $this->selectedCategory . "%")->orderByDesc($this->selectedOrderBy)->where('confirmed_at', '!=', null)->paginate(6);
            }
        }
        if ($this->selectedStatus === 'deleted') {
            if (trim($this->searchId)) {
                $products = Product::where('user_id', '=', $this->user->id)->where('id', '=', trim($this->searchId))->where('name', 'like', '%' . trim($this->searchName) . '%')->onlyTrashed()->where('category', 'like', $this->selectedCategory === 'all' ? "%%" : "%" . $this->selectedCategory . "%")->orderByDesc($this->selectedOrderBy === 'updated_at' ? 'deleted_at' : $this->selectedOrderBy)->where('confirmed_at', '!=', null)->paginate(6);
                $this->searchName = '';
            } else {
                $products = Product::where('user_id', '=', $this->user->id)->where('name', 'like', '%' . trim($this->searchName) . '%')->onlyTrashed()->where('category', 'like', $this->selectedCategory === 'all' ? "%%" : "%" . $this->selectedCategory . "%")->orderByDesc($this->selectedOrderBy === 'updated_at' ? 'deleted_at' : $this->selectedOrderBy)->where('confirmed_at', '!=', null)->paginate(6);
            }
        }

        return view('livewire.admin.user.products', compact('products'));
    }

    public function setStatus(string $newValue)
    {
        $statuses = [
            "all",
            "deleted",
        ];

        if (!in_array($newValue, $statuses)) {
            $this->selectedStatus = 'all';
            return $this->resetPage('products');
        }

        $this->selectedStatus = $newValue;
        $this->resetPage('products');
    }

    public function setOrderBy($newValue)
    {
        $orderBys = [
            "updated_at",
            "created_at",
            "id",
        ];

        if (!in_array($newValue, $orderBys)) {
            $this->selectedOrderBy = 'updated_at';
            return $this->resetPage('products');
        }

        $this->selectedOrderBy = $newValue;
        $this->resetPage('products');
    }

    public function setCategory($newValue)
    {
        $categories = [
            "all",
            "house",
            "office",
            "kitchen",
            "kids",
            "accessories"
        ];

        if (!in_array($newValue, $categories)) {
            $this->selectedCategory = 'all';
            return $this->resetPage('products');
        }

        $this->selectedCategory = $newValue;
        $this->resetPage('products');
    }

    public function reset_page()
    {
        return $this->resetPage();
    }

    public function deleteProduct($slug)
    {
        $product = Product::where('slug', '=', $slug)->withTrashed()->first();

        message('danger', 'محصول شما حذف شد!', 'محصول شما با نام «' . $product->name . '» از طرف یکی از ادمین ها از سایت حذف شد، برای بازگردانی با ادمین تماس بگیرید.', $product->user->id);

        $product->delete();
    }

    public function forceDeleteProduct($slug)
    {
        $product = Product::where('slug', '=', $slug)->withTrashed()->first();

        message('danger', 'محصول شما کاملا حذف شد!', 'محصول شما با نام «' . $product->name . '» از طرف یکی از ادمین ها از سایت به طور کامل حذف شد، امکان بازگردانی محصول وجود ندارد.', $product->user->id);

        if ($product->image) {
            Storage::disk('local')->delete("public/products/{$product->image}");
        }

        $product->forceDelete();
        toast()->success('محصول به طور کامل از سایت حذف شد!', 'موفق!')->push();
    }

    public function restoreProduct($slug)
    {
        $product = Product::where('slug', '=', $slug)->withTrashed()->first();

        message('success', 'محصول شما بازگردانی شد!', 'محصول شما با نام «' . $product->name . '» که از سایت حذف شده بود، از طرف یکی از ادمین ها به سایت بازگردانی شد و قابل نمایش است.', $product->user->id);

        $product->restore();
    }
}
