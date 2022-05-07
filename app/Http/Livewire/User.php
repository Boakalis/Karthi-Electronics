<?php

namespace App\Http\Livewire;

use App\Models\Area;
use App\Models\ReferalCode;
use App\Models\ServiceableStore;
use App\Models\User as ModelUser;
use App\Models\Wallet;
use Livewire\Component;
use Str;

class User extends Component
{

    public $name, $storeName, $image, $email, $mobile, $password, $serviceAreas ,$vendors,$referal_code,$search = '' ,$walletAmount = 0 ,$currentId = null ,$refer_list = [] ;

    protected $listeners = [
        'selectedItem' => 'changeEvent',
        'resetData',
        'currentIdEvent'
    ];

    public function currentIdEvent($id)
    {
        $this->currentId =$id;
        $this->walletAmount = Wallet::where('user_id',$this->currentId)->pluck('amount')->first();
        $this->refer_list = ModelUser::where('id',$this->currentId)->with('referList')->first();
    }

    public function resetData()
    {
        $this->name = null; $this->storeName = null; $this->image = null; $this->email = null; $this->mobile = null; $this->password; $this->referal_code = null ; $currentId = null ;$walletAmount = 0;
    }

    public function walletAdd()
    {

        Wallet::updateOrCreate(['user_id'=>$this->currentId])->update([
            'amount' => $this->walletAmount,
        ]);
        $this->emit('walletAdded');
    }

    public function hydrate()
    {
        $this->emit('loadSelect2Hydrate');
    }




    protected $rules = [
        'name' => 'required|max:255',
        // 'storeName' => 'required|max:255|unique:users,store_name',
        'email' => 'required|email|unique:users,email',
        'mobile' => 'required|integer|digits_between:7,12|unique:users,mobile',
        // 'password' => 'required|max:255',
        // 'serviceAreas' => 'required',
    ];


    public function updated($value)
    {
        $this->validateOnly($value);

        $this->vendors = ModelUser::where('user_type',3)->where('email','LIKE','%'.$this->search.'%')->with('referer','wallet')->get();
    }


    public function changeEvent($value)
    {
        $this->serviceAreas = $value;
    }

    public function mount()
    {
        $this->vendors = ModelUser::
        // where('user_type',3)
        where('email','LIKE','%'.$this->search.'%')->with('referer','wallet')->get();


    }

    public function save()
    {

        $this->validate();

        if ($this->referal_code != null) {
           $referer_data = ReferalCode::where('code',$this->referal_code)->first();
        }else{
            $referer_data = null;
        }

        if (($referer_data != null)) {
            $referer_id =$referer_data->user_id;
        } else {
            $referer_id = null;
        }


        $user =  ModelUser::create([
            'user_type' => 2,
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'user_type' => 3,
            'password' => bcrypt(12345678),
            'referred_by' => $referer_id,
        ]);

        ReferalCode::create([
            'code' => strtoupper(Str::random(6)),
            'user_id' => $user->id,
        ]);

        Wallet::create([
            'user_id' => $user->id,
            'amount' => 0 ,
        ]);



        $this->emit('stored');
    }

    public function render()
    {

        $areas = Area::where('status', 1)->get();
        return view('livewire.user', compact('areas'))->extends('admin.layouts.master')->section('content');
    }
}

