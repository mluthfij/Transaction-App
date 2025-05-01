<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $fillable = ['id_transaksi', 'id_produk', 'quantity'];

    public function produk()
    {
        return $this->belongsTo(\App\Models\Produk::class, 'id_produk');
    }

    public function transaksi()
    {
        return $this->belongsTo(\App\Models\Transaksi::class, 'id_transaksi');
    }
}
