<?php

namespace App\Http\Livewire\Web;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $categories = Category::where('status',1)->get();
        $products = Product::where('status',1)->orWhere('status',0)->with('subcategory','subcategory.category')->orderBy('id','DESC')->take(18)->get();
        $sliderData = Banner::where('type_id', 1)->orderBy('id','DESC')->inRandomOrder()->take(3)->get();
        $productBannerData = Banner::where('type_id', 2)->with('product','product.subcategory.category')->orderBy('id','DESC')->inRandomOrder()->take(2)->get();
        // dd($productBannerData);
        $adData = Banner::where('type_id', 0)->inRandomOrder()->first();
        $featuredProduct = Product::where([['is_featured',1]])->where('status',1)->orWhere('status',0)->orderBy('id','DESC')->take(16)->get();
        $exclusiveProduct = Product::where([['is_exclusive',1]])->where('status',1)->orWhere('status',0)->orderBy('id','DESC')->take(16)->get();
        $trendingProduct = Product::where([['is_trending','!=',NULL]])->where('status',1)->orWhere('status',0)->orderBy('id','DESC')->take(16)->get();

        $bestProduct = Product::where([['is_best_sellers',1]])->where('status',1)->orWhere('status',0)->orderBy('id','DESC')->take(16)->get();
        return view('livewire.web.home',compact('sliderData','categories','featuredProduct','productBannerData','exclusiveProduct','trendingProduct','bestProduct','adData','products'))->extends('web.layouts.master')->section('content');
    }
}
