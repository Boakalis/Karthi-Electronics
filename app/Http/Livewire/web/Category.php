<?php

namespace App\Http\Livewire\Web;

use App\Models\Category as ModelsCategory;
use Livewire\Component;

class Category extends Component
{
    public $datas ;
    public function render()
    {
        $this->datas = ModelsCategory::where('status',1)->orderBy('id','DESC')->get();
        return view('livewire.web.category')->extends('web.layouts.master1')->section('content');

    }
}
