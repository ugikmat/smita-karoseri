<?php
namespace App\Providers;
use App\Lokasi;
use App\Customer;
use App\Bank;
use App\Sales;
use App\CaraBayar;
use App\Supervisor;
use App\View\ViewGudang;
use App\produk;
use App\Pemborong;
use App\PBB;
use App\PPN;
use App\SPKPB;
use App\View\ViewSPKC;
use App\PrintPBB;
use App\PrintPenawaran;
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
            $view->with('salesarray', Sales::all());
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

        view()->composer('*',function($view){
            $view->with('carabayararray', CaraBayar::all());
        });

        view()->composer('*',function($view){
            $view->with('supervisorarray', Supervisor::all());
        });

        view()->composer('*',function($view){
            $view->with('gudangarray', ViewGudang::all());
        });

        view()->composer('*',function($view){
            $view->with('produkarray', produk::all());
        });

        view()->composer('*',function($view){
            $view->with('ppnarray', PPN::all());
        });

        view()->composer('*',function($view){
            $view->with('spkcarray', ViewSPKC::where('statuswo', 'ACCEPTED')->orderBy('id_spkc', 'asc')->get());
        });

        view()->composer('*',function($view){
            $view->with('pemborongarray', Pemborong::all());
        });

        view()->composer('*',function($view){
            $view->with('pbbarray', PBB::where('status', 'ACCEPTED')->get());
        });

        view()->composer('*',function($view){
            $view->with('pbbprintarray', PrintPBB::all());
        });

        view()->composer('*',function($view){
            $view->with('spkpbarray', SPKPB::where('status_spkpb', 'ACCEPTED')->orderBy('id_spkpb', 'asc')->get());
        });

        view()->composer('*',function($view){
            $view->with('penawaranarray', PrintPenawaran::all());
        });
    }
}
