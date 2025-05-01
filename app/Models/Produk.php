<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = ['produk', 'stok', 'harga'];
    
    public function detailTransaksis()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_produk');
    }

    protected static function booted () {
        static::deleting(function(Produk $produk) {
             $produk->detailTransaksis()->delete();
        });
    }
}
