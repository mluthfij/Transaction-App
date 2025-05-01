<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailTransaksi;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detail_transaksis = DetailTransaksi::with(['produk', 'transaksi'])->get();
        return view('detail_transaksis.index', compact('detail_transaksis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $detail_transaksi = DetailTransaksi::with(['produk', 'transaksi'])->findOrFail($id);
        return view('detail_transaksis.show', compact('detail_transaksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
