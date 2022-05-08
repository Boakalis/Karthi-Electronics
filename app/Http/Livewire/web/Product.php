<?php

namespace App\Http\Livewire\Web;

use App\Models\Product as ModelsProduct;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithPagination;


class Product extends Component
{
    use WithPagination;
    public $subcategory ,$category,$slug ;

    public function mount($category,$slug)
    {
        $this->category = $category;
        $this->slug = $slug;
        $this->subcategory = SubCategory::where('slug',$slug)->first();

        
    }
    
    public function render()
    {
        $datas = ModelsProduct::where('subcategory_id',$this->subcategory->id)->paginate(42);
        return view('livewire.web.product',compact('datas'))->extends('web.layouts.master1')->section('content');
    }
}
