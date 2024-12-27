<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use App\Models\Scopes\ProductConfirmedScope;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Usernotnull\Toast\Concerns\WireToast;

class ManageProducts extends Component
{
    use WireToast;
    use WithPagination;
    use WithoutUrlPagination;

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

        if (trim($this->searchId)) {
            $this->searchName = '';
            $products = Product::where('id', '=', trim($this->searchId))->where('confirmed_at', '!=', null)->paginate(1);
        } else {
            if ($this->selectedStatus === 'all') {
                $products = Product::where('name', 'like', '%' . trim($this->searchName) . '%')->where('category', 'like', $this->selectedCategory === 'all' ? "%%" : "%" . $this->selectedCategory . "%")->orderByDesc($this->selectedOrderBy)->where('confirmed_at', '!=', null)->paginate(6, pageName: 'products');
            }
            if ($this->selectedStatus === 'deleted') {
                $products = Product::where('name', 'like', '%' . trim($this->searchName) . '%')->onlyTrashed()->where('category', 'like', $this->selectedCategory === 'all' ? "%%" : "%" . $this->selectedCategory . "%")->orderByDesc($this->selectedOrderBy === 'updated_at' ? 'deleted_at' : $this->selectedOrderBy)->where('confirmed_at', '!=', null)->paginate(6, pageName: 'products');
            }
        }
        $unconfirmed_products = Product::withoutGlobalScope(ProductConfirmedScope::class)->orderByDesc('created_at')->where('confirmed_at', '=', null)->paginate(6, pageName: 'unconfirmed_products');

        return view('livewire.admin.manage-products', compact('products', 'unconfirmed_products'));
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
        return $this->resetPage('products');
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

    public function confirmProduct($slug)
    {
        $product = Product::withoutGlobalScope(ProductConfirmedScope::class)->where('slug', '=', $slug)->first();

        $product->confirmed_at = now();
        $product->update();

        message('success', 'محصول شما تایید شد!', 'محصول شما با نام «' . $product->name . '» پس از بررسی های لازم تایید شد و در سایت قابل مشاهده است.', $product->user->id);
    }

    public function cancelProduct($slug)
    {
        $product = Product::withoutGlobalScope(ProductConfirmedScope::class)->where('slug', '=', $slug)->first();

        message('danger', 'محصول شما کنسل شد!', 'محصول شما با نام «' . $product->name . '» پس از بررسی های لازم نامناسب به نظر آمد و از سایت حذف شد.', $product->user->id);

        if ($product->image) {
            Storage::disk('local')->delete("public/products/{$product->image}");
        }

        $product->delete();
        $product->forceDelete();
    }
}
