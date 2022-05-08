<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{
    public $password, $confirmPassword , $oldPassword;

    protected function rules()
    {
        return [
            'oldPassword' => 'required|min:6|max:14',
            'password' => 'required|min:6|max:14',
            'confirmPassword' => 'required|min:6|same:password|max:14'
        ];
    }

    public function updated($value)
    {
          $this->validate();

    }

    public function change()
    {
        $this->validate();
        if (Hash::check( $this->oldPassword , Auth::user()->password )) {
            User::where('id',Auth::user()->id)->update([
                'password' => bcrypt($this->password),
            ]);
            $this->emit('password-update');

        } else {
            $this->emit('password-error');
        }

    }

    public function render()
    {
        return view('livewire.change-password');
    }
}
