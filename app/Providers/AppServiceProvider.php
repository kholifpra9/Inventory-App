<?php

namespace App\Providers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\LaporanBarang;
use App\Models\PermintaanBarang;

use Illuminate\Support\Facades\Auth;
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
            // $belumDiterima = LaporanBarang::with(['barang', 'user'])->where('status', 'belum diterima')->orderBy('created_at', 'desc')->get();
            // $sudahDiterima = LaporanBarang::with(['barang', 'user'])->where('status', 'diterima')->orderBy('created_at', 'desc')->get();
            // $activeTab = 'belum-diterima';

            $jumlahLaporan = LaporanBarang::where('status', 'belum diterima')->count();
            $jumlahPermintaan = PermintaanBarang::where('status', 'belum diterima')->count();
            $total = BarangMasuk::sum('total_harga_barang');
            $barangss = Barang::get();

            
            
            if (Auth::check()) {
                $user_id = Auth::user()->id;
                $laporans = LaporanBarang::where('user_id', $user_id)->get();
                $jmlLaporanUser = LaporanBarang::where('user_id', $user_id)->count();
                $jmlPermintaanUser = PermintaanBarang::where('user_id', $user_id)->count();
                $jmlLaporanD = LaporanBarang::where('user_id', $user_id)->where('status', 'diterima')->count();
                $jmlLaporanT = LaporanBarang::where('user_id', $user_id)->where('status', 'belum diterima')->count();
                $jmlPermintaanD = LaporanBarang::where('user_id', $user_id)->where('status', 'diterima')->count();
                $jmlPermintaanT = LaporanBarang::where('user_id', $user_id)->where('status', 'belum diterima')->count();
            }else {
                return redirect()->route('login');
            }
            
    
            $view->with(compact(
                'jumlahLaporan', 'jumlahPermintaan', 'barangss', 'total', 'laporans',
                'jmlLaporanUser', 'jmlPermintaanUser', 'jmlLaporanD', 'jmlLaporanT', 'jmlPermintaanD', 'jmlPermintaanT'
            ));
        });
    }
}
