<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BarangController;
use App\Http\Controllers\Kategori_barangController;
use App\Http\Controllers\PeminjamanBController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return redirect()->route('login');
});


Auth::routes();
Route::get('laporan/pdf', [LaporanController::class, 'exportPDF'])->name('laporan.exportPDF');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/barang/stok-menipis', [BarangController::class, 'getLowStockItems']);

Route::resource('barang', App\Http\Controllers\BarangController::class);

Route::resource('kategori_barang', App\Http\Controllers\Kategori_barangController::class);

Route::resource('peminjamanB', App\Http\Controllers\PeminjamanBController::class);



Route::resource('pengembalian', App\Http\Controllers\PengembalianController::class);
Route::get('/barang-list', function () {
    return response()->json(\App\Models\Barang::select('id', 'nama_barang')->get());
});
