<?php

namespace App\Http\Livewire;

use App\Events\OrderCancelled;
use App\Events\OrderCreated;
use App\Events\OrderReturned;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class OrderView extends Component
{
    public $datas ,$d ,$cancelOrderId,$returnOrderId;

    protected $listeners = [
        'confirmCancel' => 'confirmCancel',
        'confirmReturn' => 'confirmReturn'
    ];

    public function click()
    {
        $this->d =1;
    }

    public function cancel($value)
    {
        $this->cancelOrderId =$value;
        $this->emit('cancel-alert');
    }

    public function confirmCancel()
    {
        Order::where('id',$this->cancelOrderId)->update([
            'status'=> 0,
        ]);
        // event(new OrderCreated('OrderCreated'));
        event(new OrderCancelled('OrderCreated'));

        // event(new OrderReturned('orderCancelled'));
        $this->emit('order-cancelled');

    }

    public function return($value)
    {
        $this->returnOrderId =$value;
        $this->emit('return-alert');
    }

    public function confirmReturn()
    {
        Order::where('id',$this->returnOrderId)->update([
            'status'=> 6,
        ]);
        event(new OrderReturned('OrderCreated'));
        $this->emit('order-returned');
    }

    public function mount()
    {
        $this->datas = Order::where('user_id',Auth::user()->id)->with('orders','address')->orderBy('id','DESC')->get();

    }

    public function render()
    {
        return view('livewire.order-view')->extends('web.layouts.master1')->section('content');
    }
}
