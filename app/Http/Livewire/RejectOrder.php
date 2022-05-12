<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;

class RejectOrder extends Component
{
    use WithPagination;
    public $status ,$orderId ,$remarks ,$rejectId;

    protected $listeners = [
        'statusChange' => 'statusChange',
        'orderId' => 'orderId',
        'accept' => 'accept',
        'rejectedId' => 'rejectedId',
    ];


    protected $rules = [
        'remarks' => 'required',
        'rejectId' => 'required'
    ];


    public function rejectedId($value)
    {
        $this->rejectId = $value;
    }

    public function mount()
    {
    }

    public function accept($id)
    {
        $this->orderId=$id;

        Order::where('id',$this->orderId)->update([
            'status' => 7,
            'remarks' => null,
        ]);
        $this->emit('relo');
    }

    public function submit()
    {
        $this->validate();
        $this->reject();
    }


    public function reject()
    {
        Order::where('id',$this->rejectId)->update([
            'status' => 7,
            'remarks' => $this->remarks,
        ]);
        $this->emit('relo');
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

        $datas = Order::where('status',6)->orwhere('status',7)->orderBy('id','DESC')->paginate(100);
        return view('livewire.reject-order',compact('datas'))->extends('admin.layouts.master')->section('content');
    }
}

