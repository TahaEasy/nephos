<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class SearchMenu extends Component
{
    use WithPagination;
    use WithoutUrlPagination;

    public string $search = '';

    public function render()
    {
        $products = [];
        if (trim($this->search) != '') {
            $products = Product::where('name', 'like', '%' . $this->search . '%')->orderByDesc('updated_at')->paginate(4);
        }
        return view('livewire.search-menu', compact('products'));
    }
}
