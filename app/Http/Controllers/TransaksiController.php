<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
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
        $transaksi = Transaksi::forceCreate(
            [
                'tanggal' => Carbon::now()->format('y-m-d'),
                'kode_transaksi' => '',
            ]
        );

        $kode = $transaksi->id . Carbon::now()->format('ymd');
        $transaksi->kode_transaksi = $kode;
        $transaksi->save();

        return redirect()->route('transaksis.index')->with('success', 'Transaksi berhasil ditambahkan.');
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
