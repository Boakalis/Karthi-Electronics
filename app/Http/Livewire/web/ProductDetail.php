<?php

namespace App\Http\Livewire\Web;

use App\Models\CartDetail;
use App\Models\Product;
use App\Models\User;
use App\Models\Variant;
use Livewire\Component;
use Auth;
use Hash;

class ProductDetail extends Component
{

    public $category , $product ,$slug ,$data ,$selectedVariant,$seller_price,$discounted_price ,$color = 0 ,$qty =1 ,$cart ,$login=1 ,$email ,$password ,$cartbutton =0,$buybutton =0 ,$colordata ,$colorcode;
    protected $listeners = ['variant' => 'variant' ,
        'color' =>'colorChange'
    ];

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8|max:255',
    ];

    public function mount($category, $product ,$slug)
    {
        $this->category = $category;
        $this->product = $product;
        $this->data = Product::where('slug',$slug)->first();
        $this->cart = CartDetail::where([['product_id',$this->data->id],['user_id',@Auth::user()->id],['status',1]])->first();
        $this->colordata = array_unique(json_decode($this->data->colors));
        if (!empty($this->cart)) {
            $this->colorcode = $this->cart->color_id;
            $this->color = $this->cart->color_key;
            if ($this->cart->color_id == null) {
                $this->colorcode = $this->colordata[0];
            }
        }else{
            $this->colorcode = $this->colordata[0];
        }

        $this->seller_price = $this->data->sale_price;
        $this->discounted_price = $this->data->discounted_price;
        $this->emit('mount-completed',$this->cart);
        if (empty($this->cart) && $this->data->is_products_variant != null ) {
            $this->selectedVariant = Variant::where('product_id',$this->data->id)->first();
            $this->seller_price = $this->selectedVariant->seller_price;
            $this->discounted_price = $this->selectedVariant->discounted_price;

        }else if(!empty($this->cart) && $this->data->is_products_variant != null){

            $this->selectedVariant = Variant::where('id',$this->cart->variant_id)->first();
            $this->seller_price = $this->selectedVariant->seller_price;
            $this->discounted_price = $this->selectedVariant->discounted_price;

        }
    }


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

                $this->emit('login-success',['cart'=>$this->cartbutton,'buy'=>$this->buybutton]);

            }else{

                $this->emit('credentials');
            }
        }else{
            $this->emit('no-user');
        }
    }

    public function colorChange($color)
    {
        $this->color = $color;

        $this->emit('color-emit',$this->color);

        $this->colorcode = $this->colordata[$this->color];
        if (!empty($this->cart)) {
            $this->cart();
        }
    }


    public function increase()
    {
        if ($this->qty ==2) {
            $this->emit('max-limit');
        } else {
            $this->qty = $this->qty+1;
            if (!empty($this->cart)) {
                $this->cart();
            }
        }
        $this->emit('cart-updated-emit');
    }

    public function cart()
    {

        if (@Auth::check()) {
            if ($this->data->is_products_variant != NULL) {
                $this->cart =  CartDetail::updateOrCreate(['product_id' => $this->data->id ,'user_id' => @Auth::user()->id ,'status' =>1 ],[
                    'variant_id' => $this->selectedVariant->id,
                    'qty' => $this->qty,
                    'amount' =>  $this->discounted_price,
                    'color_id' => $this->colorcode,
                    'color_key' => $this->color,
                    'dealer_id' => $this->data->dealer_id,
                    // 'status' =>1,
                ]);
                $this->emit('cart-updated');

            }else{

                $this->cart =   CartDetail::updateOrCreate(['product_id' => $this->data->id ,'user_id' => @Auth::user()->id ,'status' =>1 ] ,[
                    'qty' => $this->qty,
                    'amount' =>  $this->discounted_price,
                    'color_id' => $this->colorcode,
                    'color_key' => $this->color,
                    'dealer_id' => $this->data->dealer_id,
                    // 'status' =>1,
                ]);
                $this->emit('cart-updated');
            }
            $this->emit('cart-updated-emit');

        }else{

            $this->buybutton = 0;
            $this->cartbutton =1 ;
            $this->emit('login');
            // return redirect()->route('login');

        }


    }

    public function decrease()
    {
        if ($this->qty ==1) {
            CartDetail::where([['product_id',$this->data->id],['user_id',Auth::user()->id]])->delete();
            $this->cart =null;
        } else {
            $this->qty = $this->qty-1;
            if (!empty($this->cart)) {
                $this->cart();
            }
        }

        $this->emit('cart-updated-emit');
    }

    public function buy()
    {
        if (@Auth::check()) {
            if ($this->data->is_products_variant != NULL) {
                $this->cart =  CartDetail::updateOrCreate(['product_id' => $this->data->id ,'user_id' => @Auth::user()->id ] ,[
                    'variant_id' => $this->selectedVariant->id,
                    'qty' => $this->qty,
                    'amount' =>  $this->data->discounted_price,
                    'color_id' => $this->colorcode,
                    'status' =>1,
                ]);

            }else{
                $this->cart =  CartDetail::updateOrCreate(['product_id' => $this->data->id],[
                    'qty' => $this->qty,
                    'amount' =>  $this->data->discounted_price,
                    'color_id' => $this->colorcode,
                    'status' =>1,
                ]);
            }
        }else{
            $this->buybutton = 1;
            $this->cartbutton =0 ;
            $this->emit('login');
        }

    }


    public function variant($variantId)
    {
        $this->selectedVariant = Variant::where('id',$variantId)->first();
        $this->seller_price = $this->selectedVariant->seller_price;
        $this->discounted_price = $this->selectedVariant->discounted_price;
        if (!empty($this->cart)) {
            $this->cart();
        }
        $this->emit('alert',$this->selectedVariant);
    }



    public function render()
    {
        return view('livewire.web.product-detail')->extends('web.layouts.master1')->section('content');
    }
}
