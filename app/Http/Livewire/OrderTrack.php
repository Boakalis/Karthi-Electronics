<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Auth;
class OrderTrack extends Component
{
    // public $datas;
    public $perPage = 5 , $count;
    protected $listeners = [
        'load-more' => 'loadMore'
    ];


    public function loadMore()
    {
        $this->perPage = $this->perPage + 2;
    }

    public function render()
    {
        $this->count = Order::where([['user_id',Auth::user()->id]])->orderBy('id','DESC')->count();
        $datas = Order::where([['user_id',Auth::user()->id]])->orderBy('id','DESC')->paginate($this->perPage);
        return view('livewire.order-track',compact('datas'))->extends('web.layouts.master1')->section('content');
    }
}
