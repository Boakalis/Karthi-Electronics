<?php

namespace App\Http\Livewire\Web;

use App\Models\Product;
use Livewire\Component;

class ProductPage extends Component
{
    public $datas ,$subcategory ,$category,$slug ;

    public function mount()
    {
        $this->datas = Product::with('subcategory','subcategory.category')->get();
    }

    public function render()
    {
        return view('livewire.web.product-page')->extends('web.layouts.master1')->section('content');
    }
}
