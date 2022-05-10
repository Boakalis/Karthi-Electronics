<?php

namespace App\Http\Livewire\Web;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{

    public $name, $email, $mobile;

    public function mount()
    {
        $this->name=Auth::user()->name;
        $this->email=Auth::user()->email;
        $this->mobile=Auth::user()->mobile;
    }

    protected function rules()
    {
        return [
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            'mobile' => 'required|numeric|digits_between:8,15|unique:users,phone,' . Auth::user()->id,
            'name' => 'required|string|max:244',
        ];
    }


    public function updated($value)
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.web.profile')->extends('web.layouts.master1')->section('content');
    }
}
