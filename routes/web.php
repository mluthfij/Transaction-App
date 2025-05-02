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
Route::get('/produks/{produk}/edit', ProdukController::class .'@edit')->name('produks.edit');
Route::post('/produks', ProdukController::class .'@store')->name('produks.store');
Route::delete('/produks/{produk}', ProdukController::class .'@destroy')->name('produks.destroy');
Route::put('/produks/{produk}', ProdukController::class .'@update')->name('produks.update');

// Transaksi routes
Route::get('/transaksis', TransaksiController::class .'@index')->name('transaksis.index');
Route::get('/transaksis/{transaksi}', TransaksiController::class .'@show')->name('transaksis.show');
Route::get('/transaksis/{transaksi}/edit', transaksiController::class .'@edit')->name('transaksis.edit');
Route::post('/transaksis', TransaksiController::class .'@store')->name('transaksis.store');
Route::delete('/transaksis/{transaksi}', TransaksiController::class .'@destroy')->name('transaksis.destroy');
Route::put('/transaksis/{transaksi}', TransaksiController::class .'@update')->name('transaksis.update');

// Detail Transaksi routes
Route::get('/detail_transaksis', DetailTransaksiController::class .'@index')->name('detail_transaksis.index');
Route::get('/detail_transaksis/{detail_transaksi}', DetailTransaksiController::class .'@show')->name('detail_transaksis.show');
Route::get('/detail_transaksis/{detail_transaksi}/edit', DetailTransaksiController::class .'@edit')->name('detail_transaksis.edit');
Route::delete('/detail_transaksis/{detail_transaksi}', DetailTransaksiController::class .'@destroy')->name('detail_transaksis.destroy');
Route::put('/detail_transaksis/{detail_transaksi}', DetailTransaksiController::class .'@update')->name('detail_transaksis.update');
