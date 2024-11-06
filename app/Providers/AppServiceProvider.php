<?php

namespace App\Providers;

use App\Models\LaporanBarang;
use App\Models\PermintaanBarang;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $jumlahLaporan = LaporanBarang::where('status', 'belum diterima')->count();
            $jumlahPermintaan = PermintaanBarang::where('status', 'belum diterima')->count();
    
            $view->with(compact('jumlahLaporan', 'jumlahPermintaan'));
        });
    }
}
