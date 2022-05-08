<?php

namespace App\Http\Livewire\Web;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductPage extends Component
{

    use WithPagination;
    public  $subcategory ,$category,$slug ;


    public function mount()
    {
    }

    public function render()
    {
        $datas = Product::with('subcategory','subcategory.category')->paginate(42);
        return view('livewire.web.product-page',compact('datas'))->extends('web.layouts.master1')->section('content');
    }
}
