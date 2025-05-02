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
        // store detail transaksi in TransaksiController
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
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);
        $detail_transaksi = DetailTransaksi::findOrFail($id);
        $detail_transaksi->update($request->all());
        return redirect()->route('detail_transaksis.show', $detail_transaksi->id)->with('success', 'Detail transaksi telah diperbarui.');
    }

    /**
     * Display the specified resource for edit page.
     */
    public function edit(string $id)
    {
        $detail_transaksi = DetailTransaksi::with(['produk', 'transaksi'])->findOrFail($id);
        return view('detail_transaksis.edit', compact('detail_transaksi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detail_transaksi = DetailTransaksi::find($id);
        $detail_transaksi->delete();
        return redirect()->route('detail_transaksis.index')->with('success', 'Detail transaksi telah dihapus.');
    }
}
