<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class NewOrder extends Component
{

    use WithPagination;
    public $status ,$orderId ;

    protected $listeners = [
        'statusChange' => 'statusChange',
        'orderId' => 'orderId',
    ];

    public function mount()
    {
    }

    public function orderId($orderId)
    {
        $this->orderId = $orderId;
    }

    public function statusChange($value)
    {
        if ($value == 5) {
            Order::where('id',$this->orderId)->update([
                'status' => $value,
                'delivery_date' => Carbon::now(),
            ]);
        }else{
            Order::where('id',$this->orderId)->update([
                'status' => $value,

            ]);
        }
        $this->emit('updated');
    }

    public function render()
    {

        $datas = Order::whereDate('order_date',Carbon::today())->orderBy('id','DESC')->paginate(100);
        return view('livewire.new-order',compact('datas'))->extends('admin.layouts.master')->section('content');
    }
}
