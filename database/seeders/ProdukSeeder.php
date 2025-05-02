<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produks')->insert([
            [
                'id' => 1,
                'produk' => 'Produk A',
                'stok' => 10,
                'harga' => 10000,
            ],
            [
                'id' => 2,
                'produk' => 'Produk B',
                'stok' => 20,
                'harga' => 15000,
            ],
            [
                'id' => 3,
                'produk' => 'Produk C',
                'stok' => 0,
                'harga' => 5000,
            ],
        ]);
    }
}
