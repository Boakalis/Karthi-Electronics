<?php

namespace App\Http\Livewire;

use App\Events\OrderCreated;
use App\Models\AddressBook;
use App\Models\CartDetail;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Pincode;
use App\Models\User;
use App\Models\Wallet;
use Livewire\Component;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth as FacadesAuth;

class Cart extends Component
{
    public $datas ,$qty ,$name,$mobile,$pincode,$address_1,$address_2,$landmark,$city ,$address_id,$addressSelect ,$finalvalue ,$sum ,$coupon,$code, $walletCheck =0 ,$walletAmount = 0 ,$originalPrice ,$ultraCoin;

    protected $listeners = [
        'total' => 'sum',
        'copy' =>'couponcopy',
        'walletCheck' => 'walletCheck'
    ];

    public function walletCheck($value)
    {
        // dd($this->sum >= Auth::user()->wallet->amount );
        $this->walletCheck = $value;
        $this->originalPrice =$this->sum ;
        if ($value == 1) {

            if ($this->sum >= Auth::user()->wallet->amount) {
                $this->walletAmount =  Auth::user()->wallet->amount ;
            }else{
                $this->walletAmount = $this->sum ;
            }
        }else{
            $this->walletAmount = 0 ;
            $this->sum = $this->originalPrice ;
        }
    }

    public function buyNow()
    {

        if ($this->addressSelect == null) {
            $this->emit('no-address');
        } else {


        $order = Order::create([
            'user_id' => Auth::user()->id,
            'address_id' => $this->addressSelect,
            'amount' => $this->sum -$this->walletAmount ,
            'wallet_amount' => $this->walletAmount ,
            'status' => 1 ,
            'payment_type' => 1 ,
            'payment_id' => null ,
            'ultra_coin' => $this->ultraCoin,
            'order_date' => Carbon::now() ,
            'orderId' => Str::upper(Str::random(3).Carbon::now()->format('dM').Str::random(4))  ,
        ]);



        foreach (CartDetail::where([['user_id',Auth::user()->id],['status',1]])->get() as $key => $value) {

            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $value->product_id,
                'user_id' => $value->user_id,
                'qty' => $value->qty,
                'amount' => $value->amount,
                'status' => $value->status,
                'color_id' => $value->color_id,
                'color_key' => $value->color_key,
                'dealer_id' => $value->dealer_id,
                'variant_id' => $value->variant_id,
            ]);
        }

        CartDetail::where([['user_id',Auth::user()->id],['status',1]])->update([
            'status' => 0,
        ]);

        if ($this->walletCheck == 1) {
             Wallet::where('user_id',Auth::user()->id)->update([
                 'amount' => Auth::user()->wallet->amount - $this->walletAmount,
             ]);
        }
        $this->emit('order-created');
        event(new OrderCreated('OrderCreated'));

        return redirect()->route('order-success');
    }
    }


    public function sum($value)
    {
        $this->sum = $value;
    }

    public function resetdata()
    {
        $this->name= null;
        $this->mobile=null;
        $this->pincode=null;
        $this->address_1=null;
        $this->address_2=null;
        $this->landmark=null;
        $this->city = null;
        $this->address_id = null;
    }

    protected $rules = [
        'name' => 'required|max:255',
        'mobile' => 'required|integer|digits_between:7,10',
        'pincode' => 'required|integer|digits_between:6,7',
        'address_1' =>'required|max:255',
        'address_2' => 'nullable|max:255',
        'landmark' => 'nullable|max:255',
        'city' => 'required|max:255',

    ];

    public function setAddress($id)
    {

        User::where('id',Auth::user()->id)->update([
            'address_id' => $id ,
        ]);
        $this->addressSelect = $id;
        $this->emit('address-selected');
    }

    public function add()
    {
        $this->validate();
        $pincode = Pincode::where('pincode',$this->pincode)->exists();
        if ($pincode) {
            if ($this->address_id != null) {
                AddressBook::where('id',$this->address_id)->update([
                    'name' => $this->name,
                    'mobile' => $this->mobile,
                    'pincode' => $this->pincode,
                    'address_1' =>$this->address_1,
                    'address_2' => $this->address_2,
                    'landmark' => $this->landmark,
                    'city' => $this->city,
                    'status' => 1,
                    'user_id' =>Auth::user()->id,
                ]);
                $this->emit('address-updated');
            }else{
                $this->pincode_status = 1;
                AddressBook::create([
                    'name' => $this->name,
                    'mobile' => $this->mobile,
                    'pincode' => $this->pincode,
                    'address_1' =>$this->address_1,
                    'address_2' => $this->address_2,
                    'landmark' => $this->landmark,
                    'city' => $this->city,
                    'status' => 1,
                    'user_id' =>Auth::user()->id,
                ]);
                $this->emit('address-added');
            }
            $this->resetdata();
            $this->addresses = AddressBook::where('user_id',@Auth::user()->id)->get();
        }else{
            $this->emit('not-deliverable');
        }
    }

    public function removeAddress($id)
    {
        AddressBook::where('id',$id)->delete();
        User::where([['id',Auth::user()->id],['address_id',$id]])->update([
            'address_id' =>null,
        ]);
        $this->addresses = AddressBook::where('user_id',@Auth::user()->id)->get();
        if (User::where('id',Auth::user()->id)->pluck('address_id')->first() == null) {
            $this->addressSelect = null;
        }
        $this->emit('remove');

    }

    public function editAddress($id)
    {
        $data = AddressBook::where('id',$id)->first();
        $this->name= $data->name;
        $this->mobile=$data->mobile;
        $this->pincode=$data->pincode;
        $this->address_1=$data->address_1;
        $this->address_2=$data->address_2;
        $this->landmark=$data->landmark;
        $this->city = $data->city;
        $this->address_id=$data->id;
        $this->emit('edit-address');
    }

    public function couponcopy($value)
    {
        dd($value);
    }

    public function mount()
    {
        $this->datas = CartDetail::where([['user_id',Auth::user()->id],['status',1]])->with('variant')->get();
        $this->addresses = AddressBook::where('user_id',@Auth::user()->id)->get();
        $this->addressSelect = @Auth::user()->address_id;
        $this->coupons = Coupon::whereDate('valid_date', '<=', Carbon::now())->where('status',1)->orderBy('status','DESC')->get();
        $ultraCoin = 0;
        foreach ($this->datas as $key => $value) {
           $ultraCoin += $value->qty*$value->product->ultra_coin;
        }
        if ($ultraCoin <= 200) {
            $this->ultraCoin = $ultraCoin ;
        }else{
            $this->ultraCoin = 200;
        }
    }

    public function updated($value)
    {
        $this->validateOnly($value);



    }


    public function remove($id)
    {
        $data =CartDetail::where('id',$id)->delete();
        $this->datas = CartDetail::where([['user_id',Auth::user()->id],['status',1]])->get();
        $ultraCoin = 0;
        foreach ($this->datas as $key => $value) {
            $ultraCoin += $value->qty*$value->product->ultra_coin;
        }
         if ($ultraCoin <= 200) {
            $this->ultraCoin = $ultraCoin ;
        }else{
            $this->ultraCoin = 200;
        }
    }

    public function decrease($id)
    {
        $data =CartDetail::where('id',$id)->first();

        if ($data->qty ==1) {

            // $this->datas = CartDetail::where('user_id',Auth::user()->id)->get();
        } else {
            CartDetail::where('id',$id)->update([
                'qty' => ($data->qty)-1,
            ]);
            $this->emit('decrease');
        }
        $this->datas = CartDetail::where([['user_id',Auth::user()->id],['status',1]])->get();
        $ultraCoin = 0;
        foreach ($this->datas as $key => $value) {
            $ultraCoin += $value->qty*$value->product->ultra_coin;
         }
         if ($ultraCoin <= 200) {
            $this->ultraCoin = $ultraCoin ;
        }else{
            $this->ultraCoin = 200;
        }
    }

    public function increase($id)
    {
        $data =CartDetail::where('id',$id)->first();

        if ($data->qty ==2) {
            $this->emit('max-limit');
        } else {
            CartDetail::where('id',$id)->update([
                'qty' => ($data->qty)+1,
            ]);
            $this->emit('increase');
        }
        $this->datas = CartDetail::where([['user_id',Auth::user()->id],['status',1]])->get();
        $ultraCoin = 0;
        foreach ($this->datas as $key => $value) {
            $ultraCoin += $value->qty*$value->product->ultra_coin;
        }
        if ($ultraCoin <= 200) {
            $this->ultraCoin = $ultraCoin ;
        }else{
            $this->ultraCoin = 200;
        }
    }

    public function render()
    {

        return view('livewire.cart')->extends('web.layouts.master1')->section('content');
    }
}
