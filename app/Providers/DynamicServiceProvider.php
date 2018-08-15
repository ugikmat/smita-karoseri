<?php
namespace App\Providers;
use App\Lokasi;
use App\Customer;
use App\Bank;
use App\BO;
use Illuminate\Support\ServiceProvider;
class DynamicServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer('*',function($view){
            $view->with('lokasiarray', Lokasi::all());
        });

        view()->composer('*',function($view){
            $view->with('customerarray', Customer::all());
        });

        view()->composer('*',function($view){
            $view->with('bosarray', BO::all());
        });
        
        view()->composer('*',function($view){
            $view->with('bankarray', Bank::all());
        });
    }
}
