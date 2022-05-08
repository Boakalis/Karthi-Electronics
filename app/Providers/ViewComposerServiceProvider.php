<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Settings;
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
            $notificationData = Product::where('status',2)->count();
            $view->with(compact('notificationData'));

        });


    }
}
