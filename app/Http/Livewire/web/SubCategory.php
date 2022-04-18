<?php

namespace App\Http\Livewire\Web;

use App\Models\Category;
use App\Models\SubCategory as ModelsSubCategory;
use Livewire\Component;

class SubCategory extends Component
{

    public $slug,$datas;

    public function mount($slug)
    {
       $category =  Category::where('slug',$slug)->first();
       $this->slug = $slug;
       $this->datas = ModelsSubCategory::where('category_id',$category->id)->get();
    }

    public function render()
    {
        return view('livewire.web.sub-category')->extends('web.layouts.master')->section('content');
    }
}
