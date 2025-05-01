<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $fillable = ['transaksi_id', 'produk_id', 'quantity'];

    public function produk()
    {
        return $this->belongsTo(\App\Models\Produk::class, 'produk_id');
    }

    public function transaksi()
    {
        return $this->belongsTo(\App\Models\Transaksi::class, 'transaksi_id');
    }

}
