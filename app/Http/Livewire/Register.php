<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public $name,$email,$mobile,$password,$confirmPassword;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'mobile' => 'required|numeric|digits_between:8,15|unique:mobile',
        'password' => 'min:6|required',
        'confirmPassword' => 'required|min:6|same:password'

    ];

    public function updated($value)
    {
          $this->validate();
    }

    public function register()
    {
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'password' => bcrypt($this->password),
            'user_type' => 3,
            'status' => 1,
        ]);
        $this->emit('registered');
    }

    public function render()
    {
        return view('livewire.register')->extends('web.layouts.master1')->section('content');
    }
}
