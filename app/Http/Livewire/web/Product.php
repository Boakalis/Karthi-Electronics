<?php

namespace App\Http\Livewire\Web;

use App\Models\Product as ModelsProduct;
use App\Models\SubCategory;
use Livewire\Component;

class Product extends Component
{
    public $datas ,$subcategory;

    public function mount($category,$slug)
    {

        $this->subcategory = SubCategory::where('slug',$slug)->first();

        $this->datas = ModelsProduct::where('subcategory_id',$this->subcategory->id)->get();

    }

    public function render()
    {
        return view('livewire.web.product')->extends('web.layouts.master')->section('content');
    }
}
