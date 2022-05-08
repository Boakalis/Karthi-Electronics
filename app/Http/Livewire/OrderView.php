<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderView extends Component
{
    public $datas ,$d;

    public function click()
    {
        $this->d =1;
    }

    public function mount()
    {
        $this->datas = Order::where('user_id',Auth::user()->id)->orderBy('id','DESC')->get();
    }

    public function render()
    {
        return view('livewire.order-view')->extends('web.layouts.master1')->section('content');
    }
}
