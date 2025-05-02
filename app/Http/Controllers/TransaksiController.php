<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Produk;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksis = Transaksi::all();
        return view('transaksis.index', compact('transaksis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transaksi = $this->createTransaksi();

        if ($request->quantity > $request->stok) {
            return redirect()->route('produks.index')->with('error', 'Stok produk tidak mencukupi.');
        }

        $detail_transaksi = $this->createDetailTransaksi($transaksi->id, $request);

        $produk = Produk::find($request->id_produk);
        $produk->decrement('stok', $request->quantity);

        return redirect()->route('detail_transaksis.show', $detail_transaksi->id)->with('success', 'Transaksi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksis.show', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
        ]);

        $transaksi = Transaksi::findOrFail($id);
        $transaksi->update($request->all());
        return redirect()->route('transaksis.show', $transaksi->id)->with('success', 'Transaksi berhasil diperbarui.');
    }

    /**
     * Display the specified resource for edit page.
     */
    public function edit(string $id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksis.edit', compact('transaksi'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->delete();
        return redirect()->route('transaksis.index')->with('success', 'transaksi telah dihapus.');
    }

    private function createDetailTransaksi($transaksiId, Request $request)
    {
        return DetailTransaksi::create([
            'id_transaksi' => $transaksiId,
            'id_produk' => $request->id_produk,
            'quantity' => $request->quantity,
        ]);
    }

    private function createTransaksi()
    {
        $transaksi = Transaksi::forceCreate(
            [
                'tanggal' => Carbon::now()->format('y-m-d'),
                'kode_transaksi' => '',
            ]
        );

        $kode = $transaksi->id . Carbon::now()->format('ymd');
        $transaksi->kode_transaksi = $kode;
        $transaksi->save();

        return $transaksi;
    }
}
