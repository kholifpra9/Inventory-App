<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\LaporanBarangController;
use App\Http\Controllers\PermintaanBarangController;
use App\Http\Controllers\ProfileController;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\LaporanBarang;
use App\Models\PermintaanBarang;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['role:staf gudang']], function (){
    
    Route::get('/pengelolaan-barang', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/pengelolaan-barang/tambah-barang', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/store', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/pengelolaan-barang/edit-barang/{id}', [BarangController::class, 'edit'])->name('barang.edit');
    Route::match(['put', 'patch'], '/update/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/delete/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');

    //
    Route::get('/barang-masuk', [BarangMasukController::class, 'index'])->name('barang_masuk.index');
    Route::get('/barang-masuk/tambah-barang-masuk', [BarangMasukController::class, 'create'])->name('barang_masuk.create');
    Route::post('/store-barang-masuk', [BarangMasukController::class, 'store'])->name('barang_masuk.store');
    Route::get('/barang-masuk/edit-barang-masuk/{id}', [BarangMasukController::class, 'edit'])->name('barang_masuk.edit');
    Route::match(['put', 'patch'], '/update-barang-masuk/{id}', [BarangMasukController::class, 'update'])->name('barang_masuk.update');
    Route::delete('/delete-barang-masuk/{id}', [BarangMasukController::class, 'destroy'])->name('barang_masuk.destroy');

    //
    Route::get('/barang-keluar', [BarangKeluarController::class, 'index'])->name('barang_keluar.index');
    Route::get('/barang-keluar/tambah-barang-keluar', [BarangKeluarController::class, 'create'])->name('barang_keluar.create');
    Route::post('/store-barang-keluar', [BarangKeluarController::class, 'store'])->name('barang_keluar.store');
    Route::get('/barang-keluar/edit-barang-keluar/{id}', [BarangKeluarController::class, 'edit'])->name('barang_keluar.edit');
    Route::match(['put', 'patch'], '/update-barang-keluar/{id}', [BarangKeluarController::class, 'update'])->name('barang_keluar.update');
    Route::delete('/delete-barang-keluar/{id}', [BarangKeluarController::class, 'destroy'])->name('barang_keluar.destroy');

    Route::get('/laporan-barang', [LaporanBarangController::class, 'index'])->name('laporan_barang.index');
    Route::get('/laporan-barang/terima/{id}', [LaporanBarangController::class, 'terima'])->name('laporan_barang.terima');
    Route::match(['put', 'patch'],'/laporan-barang/terima/keluarkan/{id}', [LaporanBarangController::class, 'keluarkan'])->name('laporan_barang.keluarkan');
    

    Route::get('/permintaan-barang', [PermintaanBarangController::class, 'index'])->name('permintaan_barang.index');
    Route::get('/permintaan-barang/terima/{id}', [PermintaanBarangController::class, 'terima'])->name('permintaan_barang.permintaan');
    Route::match(['put', 'patch'],'/permintaan-barang/terima/masukan/{id}', [PermintaanBarangController::class, 'masukan'])->name('permintaan_barang.masukan');

    Route::get('/barangs/print', [BarangController::class, 'generatePDF'])->name('barang.print');
    Route::get('/barang-masuks/print', [BarangMasukController::class, 'generatePDF'])->name('barangMasuk.print');
    Route::get('/barang-keluars/print', [BarangKeluarController::class, 'generatePDF'])->name('barangKeluar.print');
    Route::get('/barang-permintaan/print', [PermintaanBarangController::class, 'generatePDF'])->name('barang_permintaan.print');
    Route::get('/barang-lapor/print', [LaporanBarangController::class, 'generatePDF'])->name('barang_laporan.print');
});

Route::group(['middleware' => ['role:guru']], function (){
    Route::get('/form-permintaan-barang', [PermintaanBarangController::class, 'formPermintaan'])->name('permintaan_barang.form');
    Route::post('/store-permintaan-barang', [PermintaanBarangController::class, 'kirimPermintaan'])->name('permintaan_barang.kirim_permintaan');

    Route::get('/form-laporan-barang', [LaporanBarangController::class, 'formLaporan'])->name('laporan_barang.form');
    Route::post('/store-laporan-barang', [LaporanBarangController::class, 'kirimLaporan'])->name('laporan_barang.kirim_laporan');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
