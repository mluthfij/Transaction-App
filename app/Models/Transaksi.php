<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ['kode_transaksi', 'tanggal'];
    
    public function detailTransaksis()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi');
    }

    protected static function booted () {
        static::deleting(function(Transaksi $transaksi) {
             $transaksi->detailTransaksis()->delete();
        });
    }
}
