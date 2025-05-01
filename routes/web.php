<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;

Route::get('/', function () {
    return view('app');
});

Route::get('/produks', ProdukController::class .'@index')->name('produks.index');
Route::get('/transaksis', TransaksiController::class .'@index')->name('transaksis.index');
Route::get('/detail_transaksis', TransaksiController::class .'@index')->name('detail_transaksis.index');
