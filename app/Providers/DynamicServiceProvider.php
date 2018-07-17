<?php
namespace App\Providers;
use App\Lokasi;
use Illuminate\Support\ServiceProvider;
class DynamicServiceProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer('*',function($view){
            $view->with('lokasiarray', Lokasi::all());
        });
    }
}
