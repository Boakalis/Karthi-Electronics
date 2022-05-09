<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Settings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

/**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['*'],function($view){
            $globalSetting = Settings::where('id',1)->first();
            $view->with(compact('globalSetting'));

        });

        View::composer(['admin.layouts.sidebar'],function($view){
            if (Auth::user()->user_type ==1) {
                $notificationData = Product::where('status',2)->count();

            } else {

                $notificationData = Product::where('status',3)->count();
            }

            $view->with(compact('notificationData'));

        });


    }
}
