<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{


    public $email, $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6|max:255',
    ];

    public function updated($value)
    {
          $this->validate();
    }

    public function login()
    {
        $this->validate();
        if ($user = User::where('email',$this->email)->first()) {
            if (Hash::check($this->password,$user->password)) {
                @Auth::attempt(['email' => $this->email, 'password' => $this->password]);

                // $this->emit('login-success',['cart'=>$this->cartbutton,'buy'=>$this->buybutton]);
                return redirect()->intended('/');
            }else{

                $this->emit('credentials');
            }
        }else{
            $this->emit('no-user');
        }
    }

    public function render()
    {
        return view('livewire.login')->extends('web.layouts.master1')->section('content');

    }
}
