<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DetailTransaksiController;

Route::get('/', function () {
    return redirect()->route('produks.index');
});

// Produk routes
Route::get('/produks', ProdukController::class .'@index')->name('produks.index');
Route::get('/produks/new', ProdukController::class .'@new')->name('produks.new');
Route::get('/produks/{produk}', ProdukController::class .'@show')->name('produks.show');
Route::post('/produks', ProdukController::class .'@store')->name('produks.store');

// Transaksi routes
Route::get('/transaksis', TransaksiController::class .'@index')->name('transaksis.index');
Route::get('/transaksis/{transaksi}', TransaksiController::class .'@show')->name('transaksis.show');
Route::post('/transaksis', TransaksiController::class .'@store')->name('transaksis.store');

// Detail Transaksi routes
Route::get('/detail_transaksis', DetailTransaksiController::class .'@index')->name('detail_transaksis.index');
Route::get('/detail_transaksis/{detail_transaksi}', DetailTransaksiController::class .'@show')->name('detail_transaksis.show');
