<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OrderSuccess extends Component
{
    public function render()
    {
        return view('livewire.order-success')->extends('web.layouts.master1')->section('content');
    }
}
