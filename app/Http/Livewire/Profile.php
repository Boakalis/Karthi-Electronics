<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Profile extends Component
{
    public $name, $tab,$storeName,$email,$password,$confirmPassword;


    public function mount()
    {
        $this->tab =1 ;
    }

    public function tabChange($id)
    {
        $this->tab = $id;
    }


    protected $rules = [
        'name' => 'required|max:255',
        // 'storeName' => 'required|max:255',
        // // 'storeName' => 'required|max:255',
        // 'email' => 'required|email',
        // // 'oldPassword' => 'required|string|max:255',
        // 'password' => 'required|string|max:255',
        // 'confirmPassword' => 'required|string|max:255',
    ];

    public function render()
    {
        return view('livewire.profile')->extends('admin.layouts.master')->section('content');
    }

    public function updated($value)
    {
        $this->validate();
    }

    public function save()
    {
     
        $this->validate();
        dd|(1);
    }

}
