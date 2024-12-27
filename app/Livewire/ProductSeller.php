<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class ProductSeller extends Component
{
    use WireToast;

    public $product;

    public function delete_product(Product $product)
    {
        $product->delete();

        if ($product->image) {
            Storage::disk('local')->delete("public/products/{$product->image}");
        }

        toast()->success('محصول با موفقیت از سایت حذف شد!', 'موفق!')->push();
        $this->dispatch('refresh');
    }

    public function render()
    {
        return view('livewire.product-seller');
    }
}
