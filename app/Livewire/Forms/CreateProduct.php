<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class CreateProduct extends Component
{
    protected $listeners = ['refresh' => '$refresh'];
    use WithPagination;
    use WithoutUrlPagination;

    public function render()
    {
        $products = Product::where('user_id', '=', auth()->id())->orderBy('updated_at', 'desc')->paginate(5);

        return view('livewire.forms.create-product', compact('products'));
    }
}
