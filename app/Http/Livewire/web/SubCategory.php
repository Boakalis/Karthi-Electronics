<?php

namespace App\Http\Livewire\Web;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory as ModelsSubCategory;
use Livewire\Component;
use Livewire\WithPagination;

class SubCategory extends Component
{
    use WithPagination;

    public $slug,$datas,$category;

    public function mount($slug)
    {
       $this->category =  Category::where('slug',$slug)->first();
       $this->slug = $slug;
       $this->datas = ModelsSubCategory::where('category_id',$this->category->id)->get();
    }

    public function render()
    {
        $allProducts = Product::where('status',1)->orWhere('status',0)->where('category_id',$this->category->id)->orderBy('id','DESC')->paginate(42);
        return view('livewire.web.sub-category',compact('allProducts'))->extends('web.layouts.master1')->section('content');
    }
}
