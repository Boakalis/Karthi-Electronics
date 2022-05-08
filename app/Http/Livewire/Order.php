<?php

namespace App\Http\Livewire;

use App\Models\Order as ModelsOrder;
use Livewire\Component;
use Livewire\WithPagination;

class Order extends Component
{

    use WithPagination;
    public $status ;

    public function mount()
    {
    }

    public function render()
    {
        
        $datas = ModelsOrder::orderBy('id','DESC')->paginate(100);
        return view('livewire.order',compact('datas'))->extends('admin.layouts.master')->section('content');
    }
}
