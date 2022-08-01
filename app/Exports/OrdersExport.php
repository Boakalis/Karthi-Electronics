<?php

namespace App\Exports;

use App\Models\Order;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OrdersExport implements FromView
{

    public $start , $end ;

    public function __construct($start, $end)
    {
        $this->start = $start;
        $this->end = $end;

    }

    public function view(): View
    {
        return view('exports.orders', [
            'datas' => Order::
            whereBetween('created_at',[$this->start,$this->end])->
            with('user','address','orders')->get()
        ]);
    }
}
