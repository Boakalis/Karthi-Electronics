<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Settings;
use Livewire\Component;

class Invoice extends Component
{
    public $data ,$storeData ,$value;


    public function mount($id)
    {

        $this->data = Order::where('id',$id)->with('orders','address')->first();
        $this->storeData =Settings::where('id',1)->first();
    }


    public function render()
    {
        return view('livewire.invoice')->extends('layouts.app')->section('content');
    }
}
