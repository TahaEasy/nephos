<?php

namespace App\Livewire;

use Livewire\Component;

class ProductsHeader extends Component
{
    public $id;
    public $header;

    public function render()
    {
        return view('livewire.products-header');
    }
}
