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
        $sliderData = Banner::where('type_id', 1)->inRandomOrder()->take(3)->get();
        $productBannerData = Banner::where('type_id', 2)->inRandomOrder()->take(2)->get();
        $adData = Banner::where('type_id', 0)->inRandomOrder()->first();
        $featuredProduct = Product::where([['status',1],['is_featured',1]])->get();
        $exclusiveProduct = Product::where([['status',1],['is_exclusive',1]])->get();
        $trendingProduct = Product::where([['status',1],['is_trending',1]])->get();
        $bestProduct = Product::where([['status',1],['is_best_sellers',1]])->get();
        return view('livewire.web.home',compact('sliderData','categories','featuredProduct','productBannerData','exclusiveProduct','trendingProduct','bestProduct','adData'))->extends('web.layouts.master')->section('content');
    }
}
