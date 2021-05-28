<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Manufacture;
use App\Protype;
use App\Product;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        view()->composer('*', function($view){
            $view->with([
                'manufacture'=>Manufacture::all(),
                'protype'=>Protype::all(),
                'product'=>Product::all()->take(10),


            ]);
        });
    }
}
