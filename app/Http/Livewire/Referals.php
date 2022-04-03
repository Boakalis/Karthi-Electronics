<?php

namespace App\Http\Livewire;
use Livewire\Component;

class Referals extends Component
{
    public function render()
    {
        return view('livewire.referals')->extends('admin.layouts.master')->section('content');
    }
}
