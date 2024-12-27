<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class SearchProductPage extends Component
{
    use WithPagination;

    #[Url(as: 's', except: '')]
    public ?string $search = '';

    #[Url(as: 'c', except: 'all')]
    public ?string $selectedCategory = 'all';

    #[Url(as: 'o', except: 'newest-products')]
    public string $orderBy = 'newest-products';

    public $productStyle = '';
    public $product;

    public function mount()
    {
        $this->productStyle = Cookie::get('product-style') ?? 'list';
    }

    public function render()
    {
        $this->search = trim($this->search);

        $products_house = null;
        $products_office = null;
        $products_kitchen = null;
        $products_kids = null;
        $products_accessories = null;

        $categories = ['all', 'house', 'office', 'kitchen', 'kids', 'accessories'];
        if (!in_array($this->selectedCategory, $categories)) {
            $this->selectedCategory = 'all';
        }

        $orderBys = ['newest-products', 'cheapest-products', 'most-expensive-products', 'most-discount'];
        if (!in_array($this->orderBy, $orderBys)) {
            $this->orderBy = 'newest-products';
        }

        if (strlen(trim($this->search)) > 4) {
            if ($this->orderBy === 'newest-products') {
                if ($this->selectedCategory === 'house' || $this->selectedCategory === 'all') {
                    $products_house = Product::where('category', '=', 'house')->orderBy('created_at', 'desc')->where('name', 'like', "%" . trim($this->search) . "%")->paginate(6, pageName: 'products_house');
                }

                if ($this->selectedCategory === 'office' || $this->selectedCategory === 'all') {
                    $products_office = Product::where('category', '=', 'office')->orderBy('created_at', 'desc')->where('name', 'like', "%" . trim($this->search) . "%")->paginate(6, pageName: 'products_office');
                }

                if ($this->selectedCategory === 'kitchen' || $this->selectedCategory === 'all') {
                    $products_kitchen = Product::where('category', '=', 'kitchen')->orderBy('created_at', 'desc')->where('name', 'like', "%" . trim($this->search) . "%")->paginate(6, pageName: 'products_kitchen');
                }

                if ($this->selectedCategory === 'kids' || $this->selectedCategory === 'all') {
                    $products_kids = Product::where('category', '=', 'kids')->orderBy('created_at', 'desc')->where('name', 'like', "%" . trim($this->search) . "%")->paginate(6, pageName: 'products_kids');
                }

                if ($this->selectedCategory === 'accessories' || $this->selectedCategory === 'all') {
                    $products_accessories = Product::where('category', '=', 'accessories')->orderBy('created_at', 'desc')->where('name', 'like', "%" . trim($this->search) . "%")->paginate(6, pageName: 'products_accessories');
                }
            }

            if ($this->orderBy === 'most-discount') {
                if ($this->selectedCategory === 'house' || $this->selectedCategory === 'all') {
                    $products_house = Product::where('category', '=', 'house')->orderBy('discount', 'desc')->where('name', 'like', "%" . trim($this->search) . "%")->paginate(6, pageName: 'products_house');
                }
                if ($this->selectedCategory === 'office' || $this->selectedCategory === 'all') {
                    $products_office = Product::where('category', '=', 'office')->orderBy('discount', 'desc')->where('name', 'like', "%" . trim($this->search) . "%")->paginate(6, pageName: 'products_office');
                }
                if ($this->selectedCategory === 'kitchen' || $this->selectedCategory === 'all') {
                    $products_kitchen = Product::where('category', '=', 'kitchen')->orderBy('discount', 'desc')->where('name', 'like', "%" . trim($this->search) . "%")->paginate(6, pageName: 'products_kitchen');
                }
                if ($this->selectedCategory === 'kids' || $this->selectedCategory === 'all') {
                    $products_kids = Product::where('category', '=', 'kids')->orderBy('discount', 'desc')->where('name', 'like', "%" . trim($this->search) . "%")->paginate(6, pageName: 'products_kids');
                }
                if ($this->selectedCategory === 'accessories' || $this->selectedCategory === 'all') {
                    $products_accessories = Product::where('category', '=', 'accessories')->orderBy('discount', 'desc')->where('name', 'like', "%" . trim($this->search) . "%")->paginate(6, pageName: 'products_accessories');
                }
            }

            if ($this->orderBy === 'most-expensive-products') {
                if ($this->selectedCategory === 'house' || $this->selectedCategory === 'all') {
                    $products_house = Product::where('category', '=', 'house')
                        ->select(
                            'products.*',
                            DB::raw('products.price - (products.price * products.discount / 100) AS dis_price')
                        )
                        ->orderByDesc('dis_price')
                        ->where('name', 'like', "%" . trim($this->search) . "%")->paginate(6, pageName: 'products_house');
                }

                if ($this->selectedCategory === 'office' || $this->selectedCategory === 'all') {
                    $products_office = Product::where('category', '=', 'office')
                        ->select(
                            'products.*',
                            DB::raw('products.price - (products.price * products.discount / 100) AS dis_price')
                        )
                        ->orderByDesc('dis_price')
                        ->where('name', 'like', "%" . trim($this->search) . "%")->paginate(6, pageName: 'products_office');
                }

                if ($this->selectedCategory === 'kitchen' || $this->selectedCategory === 'all') {
                    $products_kitchen = Product::where('category', '=', 'kitchen')
                        ->select(
                            'products.*',
                            DB::raw('products.price - (products.price * products.discount / 100) AS dis_price')
                        )
                        ->orderByDesc('dis_price')
                        ->where('name', 'like', "%" . trim($this->search) . "%")->paginate(6, pageName: 'products_kitchen');
                }

                if ($this->selectedCategory === 'kids' || $this->selectedCategory === 'all') {
                    $products_kids = Product::where('category', '=', 'kids')
                        ->select(
                            'products.*',
                            DB::raw('products.price - (products.price * products.discount / 100) AS dis_price')
                        )
                        ->orderByDesc('dis_price')
                        ->where('name', 'like', "%" . trim($this->search) . "%")->paginate(6, pageName: 'products_kids');
                }

                if ($this->selectedCategory === 'accessories' || $this->selectedCategory === 'all') {
                    $products_accessories = Product::where('category', '=', 'accessories')
                        ->select(
                            'products.*',
                            DB::raw('products.price - (products.price * products.discount / 100) AS dis_price')
                        )
                        ->orderByDesc('dis_price')
                        ->where('name', 'like', "%" . trim($this->search) . "%")->paginate(6, pageName: 'products_accessories');
                }
            }

            if ($this->orderBy === 'cheapest-products') {
                if ($this->selectedCategory === 'house' || $this->selectedCategory === 'all') {
                    $products_house = Product::where('category', '=', 'house')
                        ->select(
                            'products.*',
                            DB::raw('products.price - (products.price * products.discount / 100) AS dis_price')
                        )
                        ->orderBy('dis_price')
                        ->where('name', 'like', "%" . trim($this->search) . "%")->paginate(6, pageName: 'products_house');
                }

                if ($this->selectedCategory === 'office' || $this->selectedCategory === 'all') {
                    $products_office = Product::where('category', '=', 'office')
                        ->select(
                            'products.*',
                            DB::raw('products.price - (products.price * products.discount / 100) AS dis_price')
                        )
                        ->orderBy('dis_price')
                        ->where('name', 'like', "%" . trim($this->search) . "%")->paginate(6, pageName: 'products_office');
                }

                if ($this->selectedCategory === 'kitchen' || $this->selectedCategory === 'all') {
                    $products_kitchen = Product::where('category', '=', 'kitchen')
                        ->select(
                            'products.*',
                            DB::raw('products.price - (products.price * products.discount / 100) AS dis_price')
                        )
                        ->orderBy('dis_price')
                        ->where('name', 'like', "%" . trim($this->search) . "%")->paginate(6, pageName: 'products_kitchen');
                }

                if ($this->selectedCategory === 'kids' || $this->selectedCategory === 'all') {
                    $products_kids = Product::where('category', '=', 'kids')
                        ->select(
                            'products.*',
                            DB::raw('products.price - (products.price * products.discount / 100) AS dis_price')
                        )
                        ->orderBy('dis_price')
                        ->where('name', 'like', "%" . trim($this->search) . "%")->paginate(6, pageName: 'products_kids');
                }

                if ($this->selectedCategory === 'accessories' || $this->selectedCategory === 'all') {
                    $products_accessories = Product::where('category', '=', 'accessories')
                        ->select(
                            'products.*',
                            DB::raw('products.price - (products.price * products.discount / 100) AS dis_price')
                        )
                        ->orderBy('dis_price')
                        ->where('name', 'like', "%" . trim($this->search) . "%")->paginate(6, pageName: 'products_accessories');
                }
            }

            if (!$products_house || count($products_house) <= 0) {
                $products_house = null;
            }
            if (!$products_office || count($products_office) <= 0) {
                $products_office = null;
            }
            if (!$products_kitchen || count($products_kitchen) <= 0) {
                $products_kitchen = null;
            }
            if (!$products_kids || count($products_kids) <= 0) {
                $products_kids = null;
            }
            if (!$products_accessories || count($products_accessories) <= 0) {
                $products_accessories = null;
            }
        }

        return view('livewire.search-product-page', compact('products_house', 'products_office', 'products_kids', 'products_kitchen', 'products_accessories'));
    }

    public function setOrderBy($newValue)
    {
        $this->orderBy = $newValue;
        $this->resetPage('products_house');
        $this->resetPage('products_office');
        $this->resetPage('products_kitchen');
        $this->resetPage('products_kids');
        $this->resetPage('products_accessories');
    }

    public function setCategory($newValue)
    {
        $this->selectedCategory = $newValue;
        $this->resetPage('products_house');
        $this->resetPage('products_office');
        $this->resetPage('products_kitchen');
        $this->resetPage('products_kids');
        $this->resetPage('products_accessories');
    }

    public function setStyle($style): void
    {
        $this->productStyle = $style;
        cookie()->queue(cookie('product-style', $style, 60 * 24 * 365, '/'));
        $this->dispatch('styled');
    }

    public function reset_page()
    {
        $this->resetPage('products_house');
        $this->resetPage('products_office');
        $this->resetPage('products_kitchen');
        $this->resetPage('products_kids');
        $this->resetPage('products_accessories');
    }
}
