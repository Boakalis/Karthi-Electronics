<?php

namespace App\Http\Livewire;

use App\Models\Order as ModelsOrder;
use App\Models\OrderDetail;
use App\Models\Settings;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use PDF;

class Order extends Component
{

    use WithPagination;
    public $status ,$imei =null ,$orderId,$orders = [];

    protected $listeners = [
        'statusChange' => 'statusChange',
        'orderId' => 'orderId',
        'get' => 'order',
        'imei' => 'imei',
        'download' =>  'pdf'
    ];

    public function imei($imei)
    {
        $this->imei = $imei;
    }

    public function order($id)
    {
        $datas = OrderDetail::where('order_id',$id)->with('order','product','variant')->get();
       $this->orders = $datas;
    }

    public function pdf($id)
    {
        $data = ModelsOrder::where('id',$id)->with('orders','address')->first();
        $storeData =Settings::where('id',1)->first();
        $imei = $this->imei;
        $pdf = PDF::loadView('livewire.invoice', compact('data','storeData','imei'))->setPaper('a4', 'portrait')->output();
        // return $pdf->download('invoice.pdf');
        $this->imei = null;
        return response()->streamDownload(
            fn () => print($pdf),
            "filename.pdf"
       );

    }

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
            ModelsOrder::where('id',$this->orderId)->update([
                'status' => $value,
                'delivery_date' => Carbon::now(),
            ]);
        }else{
            ModelsOrder::where('id',$this->orderId)->update([
                'status' => $value,

            ]);
        }
        $this->emit('updated');
    }

    public function render()
    {

        $datas = ModelsOrder::orderBy('id','DESC')->paginate(100);
        return view('livewire.order',compact('datas'))->extends('admin.layouts.master')->section('content');
    }
}
