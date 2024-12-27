<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ProductsStyle extends Component
{
    use WithPagination;
    use WithoutUrlPagination;

    public $productStyle = '';

    public string $orderBy = 'جدیدترین محصولات';

    public function mount()
    {
        $this->productStyle = Cookie::get('product-style') ?? 'list';
    }

    public function render()
    {
        $orderBys = ['random-order', 'most-discount', 'most-expensive-products', 'cheapest-products', 'newest-products'];

        if (!in_array($this->orderBy, $orderBys)) {
            $this->orderBy = 'newest-products';
        }

        if ($this->orderBy === 'random-order') {
            $products_house = Product::where('category', '=', 'house')->inRandomOrder()->paginate(6, pageName: 'products_house');
            $products_office = Product::where('category', '=', 'office')->inRandomOrder()->paginate(6, pageName: 'products_office');
            $products_kitchen = Product::where('category', '=', 'kitchen')->inRandomOrder()->paginate(6, pageName: 'products_kitchen');
            $products_kids = Product::where('category', '=', 'kids')->inRandomOrder()->paginate(6, pageName: 'products_kids');
            $products_accessories = Product::where('category', '=', 'accessories')->inRandomOrder()->paginate(6, pageName: 'products_accessories');
        }

        if ($this->orderBy === 'newest-products') {
            $products_house = Product::where('category', '=', 'house')->orderBy('created_at', 'desc')->paginate(6, pageName: 'products_house');
            $products_office = Product::where('category', '=', 'office')->orderBy('created_at', 'desc')->paginate(6, pageName: 'products_office');
            $products_kitchen = Product::where('category', '=', 'kitchen')->orderBy('created_at', 'desc')->paginate(6, pageName: 'products_kitchen');
            $products_kids = Product::where('category', '=', 'kids')->orderBy('created_at', 'desc')->paginate(6, pageName: 'products_kids');
            $products_accessories = Product::where('category', '=', 'accessories')->orderBy('created_at', 'desc')->paginate(6, pageName: 'products_accessories');
        }

        if ($this->orderBy === 'most-discount') {
            $products_house = Product::where('category', '=', 'house')->orderBy('discount', 'desc')->paginate(6, pageName: 'products_house');
            $products_office = Product::where('category', '=', 'office')->orderBy('discount', 'desc')->paginate(6, pageName: 'products_office');
            $products_kitchen = Product::where('category', '=', 'kitchen')->orderBy('discount', 'desc')->paginate(6, pageName: 'products_kitchen');
            $products_kids = Product::where('category', '=', 'kids')->orderBy('discount', 'desc')->paginate(6, pageName: 'products_kids');
            $products_accessories = Product::where('category', '=', 'accessories')->orderBy('discount', 'desc')->paginate(6, pageName: 'products_accessories');
        }

        if ($this->orderBy === 'most-expensive-products') {
            $products_house = Product::where('category', '=', 'house')
                ->select(
                    'products.*',
                    DB::raw('products.price - (products.price * products.discount / 100) AS dis_price')
                )
                ->orderByDesc('dis_price')
                ->paginate(6, pageName: 'products_house');

            $products_office = Product::where('category', '=', 'office')
                ->select(
                    'products.*',
                    DB::raw('products.price - (products.price * products.discount / 100) AS dis_price')
                )
                ->orderByDesc('dis_price')
                ->paginate(6, pageName: 'products_office');

            $products_kitchen = Product::where('category', '=', 'kitchen')
                ->select(
                    'products.*',
                    DB::raw('products.price - (products.price * products.discount / 100) AS dis_price')
                )
                ->orderByDesc('dis_price')
                ->paginate(6, pageName: 'products_kitchen');

            $products_kids = Product::where('category', '=', 'kids')
                ->select(
                    'products.*',
                    DB::raw('products.price - (products.price * products.discount / 100) AS dis_price')
                )
                ->orderByDesc('dis_price')
                ->paginate(6, pageName: 'products_kids');

            $products_accessories = Product::where('category', '=', 'accessories')
                ->select(
                    'products.*',
                    DB::raw('products.price - (products.price * products.discount / 100) AS dis_price')
                )
                ->orderByDesc('dis_price')
                ->paginate(6, pageName: 'products_accessories');
        }

        if ($this->orderBy === 'cheapest-products') {
            $products_house = Product::where('category', '=', 'house')
                ->select(
                    'products.*',
                    DB::raw('products.price - (products.price * products.discount / 100) AS dis_price')
                )
                ->orderBy('dis_price')
                ->paginate(6, pageName: 'products_house');

            $products_office = Product::where('category', '=', 'office')
                ->select(
                    'products.*',
                    DB::raw('products.price - (products.price * products.discount / 100) AS dis_price')
                )
                ->orderBy('dis_price')
                ->paginate(6, pageName: 'products_office');

            $products_kitchen = Product::where('category', '=', 'kitchen')
                ->select(
                    'products.*',
                    DB::raw('products.price - (products.price * products.discount / 100) AS dis_price')
                )
                ->orderBy('dis_price')
                ->paginate(6, pageName: 'products_kitchen');

            $products_kids = Product::where('category', '=', 'kids')
                ->select(
                    'products.*',
                    DB::raw('products.price - (products.price * products.discount / 100) AS dis_price')
                )
                ->orderBy('dis_price')
                ->paginate(6, pageName: 'products_kids');

            $products_accessories = Product::where('category', '=', 'accessories')
                ->select(
                    'products.*',
                    DB::raw('products.price - (products.price * products.discount / 100) AS dis_price')
                )
                ->orderBy('dis_price')
                ->paginate(6, pageName: 'products_accessories');
        }

        return view('livewire.products-style', compact('products_house', 'products_office', 'products_kids', 'products_kitchen', 'products_accessories'));
    }

    public function setOrderBy($newValue)
    {
        $orderBys = ['random-order', 'most-discount', 'most-expensive-products', 'cheapest-products', 'newest-products'];

        if (!in_array($this->orderBy, $orderBys)) {
            $this->orderBy = 'newest-products';
        } else {
            $this->orderBy = $newValue;
        }

        $this->resetPage('products_house');
        $this->resetPage('products_office');
        $this->resetPage('products_kitchen');
        $this->resetPage('products_kids');
        $this->resetPage('products_accessories');
    }

    public function setStyle($style = 'list'): void
    {
        if ($style !== 'block' && $style !== 'list') {
            $this->productStyle = 'list';
            cookie()->queue(cookie('product-style', 'list', 60 * 24 * 365, '/'));
            $this->dispatch('styled');
        } else {
            $this->productStyle = $style;
            cookie()->queue(cookie('product-style', $style, 60 * 24 * 365, '/'));
            $this->dispatch('styled');
        }
    }
}
