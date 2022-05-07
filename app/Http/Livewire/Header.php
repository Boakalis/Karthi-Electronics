<?php

namespace App\Http\Livewire;

use App\Models\CartDetail;
use Livewire\Component;
use Auth;

class Header extends Component
{
    public $cartCount;

    protected $listeners =[
        'cart-updated-emit' => 'updateCount',
    ];

    public function updateCount()
    {


        $this->cartCount = CartDetail::where([['user_id',@Auth::user()->id],['status',1]])->count();
        $this->emit('cartUpdatedValue', $this->cartCount);
    }

    public function render()
    {
        $this->cartCount = CartDetail::where([['user_id',@Auth::user()->id],['status',1]])->count();
        return view('livewire.header');
    }
}
