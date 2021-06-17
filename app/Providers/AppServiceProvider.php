<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
<<<<<<< HEAD
use App\Manufacture;
use App\Protype;
use App\Product;

=======
use Illuminate\Pagination\Paginator;
>>>>>>> Trung
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
<<<<<<< HEAD
        view()->composer('*', function($view){
            $view->with([
                'manufacture'=>Manufacture::all(),
                'protype'=>Protype::all(),
                'product'=>Product::all()->take(10),


            ]);
        });
=======
        Paginator::defaultView('vendor.pagination.bootstrap-4');
>>>>>>> Trung
    }
}
