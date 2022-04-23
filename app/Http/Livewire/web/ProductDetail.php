<?php

namespace App\Http\Livewire\Web;

use App\Models\CartDetail;
use App\Models\Product;
use App\Models\Variant;
use Livewire\Component;
use Auth;

class ProductDetail extends Component
{

    public $category , $product ,$slug ,$data ,$selectedVariant,$seller_price,$discounted_price ,$color = 0 ,$qty =1 ,$cart ,$login=1;
    protected $listeners = ['variant' => 'variant'];

    public function mount($category, $product ,$slug)
    {
        $this->category = $category;
        $this->product = $product;
        $this->data = Product::where('slug',$slug)->first();
        $this->cart = CartDetail::where('product_id',$this->data->id)->first();
        $this->seller_price = $this->data->sale_price;
        $this->discounted_price = $this->data->discounted_price;
    }

    public function colorChange($color)
    {
        $this->color = $color;
    }


    public function increase()
    {
        if ($this->qty ==2) {
            $this->emit('max-limit');
        } else {
            $this->qty = $this->qty+1;
        }

    }

    public function cart()
    {

        if (Auth::check()) {
            if ($this->data->is_products_variant != NULL) {
                $this->cart =  CartDetail::updateOrCreate(['product_id' => $this->data->id],[
                    'variant_id' => $this->selectedVariant->id,
                    'qty' => $this->qty,
                    'amount' => $this->qty * $this->data->discounted_price,
                    'color_id' => $this->color,
                    'status' =>1,
                ]);

            }else{
                $this->cart =  CartDetail::updateOrCreate(['product_id' => $this->data->id],[
                    'qty' => $this->qty,
                    'amount' => $this->qty * $this->data->discounted_price,
                    'color_id' => $this->color,
                    'status' =>1,
                ]);
            }
        }else{
            // $this->emit('login');
            return redirect()->route('login');
        }


    }

    public function decrease()
    {
        if ($this->qty ==1) {
            CartDetail::where('product_id',$this->data->id)->delete();
            $this->cart =null;
        } else {
            $this->qty = $this->qty-1;
        }

    }

    public function buy()
    {
        if (Auth::check()) {
            if ($this->data->is_products_variant != NULL) {
                $this->cart =  CartDetail::updateOrCreate(['product_id' => $this->data->id],[
                    'variant_id' => $this->selectedVariant->id,
                    'qty' => $this->qty,
                    'amount' => $this->qty * $this->data->discounted_price,
                    'color_id' => $this->color,
                    'status' =>1,
                ]);

            }else{
                $this->cart =  CartDetail::updateOrCreate(['product_id' => $this->data->id],[
                    'qty' => $this->qty,
                    'amount' => $this->qty * $this->data->discounted_price,
                    'color_id' => $this->color,
                    'status' =>1,
                ]);
            }
        }else{
            $this->emit('login');
        }

    }


    public function variant($variantId)
    {
        $this->selectedVariant = Variant::where('id',$variantId)->first();

        $this->seller_price = $this->selectedVariant->seller_price;
        $this->discounted_price = $this->selectedVariant->discounted_price;
        $this->emit('alert',$this->selectedVariant);
    }



    public function render()
    {
        return view('livewire.web.product-detail')->extends('web.layouts.master')->section('content');
    }
}
