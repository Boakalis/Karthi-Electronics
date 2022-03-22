<?php

namespace App\Http\Livewire;

use App\Models\Area;
use App\Models\ServiceableStore;
use App\Models\User;
use Livewire\Component;

class Vendor extends Component
{

    public $name, $storeName, $image, $email, $mobile, $password, $serviceAreas ,$vendors;

    protected $listeners = [
        'selectedItem' => 'changeEvent',
        'resetData',
    ];

    public function resetData()
    {
        $this->name = null; $this->storeName = null; $this->image = null; $this->email = null; $this->mobile = null; $this->password; $this->serviceAreas=null;
    }

    public function hydrate()
    {
        $this->emit('loadSelect2Hydrate');
    }


    protected $rules = [
        'name' => 'required|max:255',
        'storeName' => 'required|max:255|unique:users,store_name',
        'email' => 'required|email|unique:users,email',
        'mobile' => 'required|integer|digits_between:7,12|unique:users,mobile',
        'password' => 'required|max:255',
        'serviceAreas' => 'required',
    ];


    public function updated($value)
    {
        $this->validateOnly($value);
    }


    public function changeEvent($value)
    {
        $this->serviceAreas = $value;
    }

    public function mount()
    {
        $this->vendors = User::where('user_type',2)->get();

    }

    public function save()
    {
        $this->validate();
        $user =  User::create([
            'user_type' => 2,
            'name' => $this->name,
            'store_name' => $this->storeName,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'user_type' => 2,
            'password' => bcrypt($this->password),
        ]);

        foreach ($this->serviceAreas as  $value) {
            ServiceableStore::create([
                'area_id' => $value,
                'store_id' =>$user->id,
            ]);
        }

        $this->emit('stored');
    }

    public function render()
    {
        $areas = Area::where('status', 1)->get();
        return view('livewire.vendor', compact('areas'))->extends('admin.layouts.master')->section('content');
    }
}
