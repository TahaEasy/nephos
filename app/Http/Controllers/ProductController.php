<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class ProductController extends Controller
{
    public function getImage($slug)
    {
        $product = Product::where('slug', '=', $slug)->withTrashed()->first();

        $path = storage_path('app/public/products/') . $product->image;

        if (!File::exists($path) || !$product->image) {
            $path = public_path('img/fallback-product.png');
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }

    public function index()
    {
        return view('products');
    }

    public function show(Product $product)
    {
        return view('product-page', ['product' => $product]);
    }

    public function search()
    {
        return view('search-product-page');
    }

    public function shop()
    {
        $house_products = Product::where('category', '=', 'house')->get();
        $kitchen_products = Product::where('category', '=', 'kitchen')->get();
        $office_products = Product::where('category', '=', 'office')->get();
        $kids_products = Product::where('category', '=', 'kids')->get();
        $accessories_products = Product::where('category', '=', 'accessories')->get();

        $house_count = count($house_products);
        $kitchen_count = count($kitchen_products);
        $office_count = count($office_products);
        $kids_count = count($kids_products);
        $accessories_count = count($accessories_products);

        return view('shop', compact('house_count', 'kitchen_count', 'office_count', 'kids_count', 'accessories_count'));
    }
}
