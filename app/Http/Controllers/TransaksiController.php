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
        $cart = session('cart', []);
    
        $transaksi = $this->createTransaksi();

        foreach ($cart as $item) {
            $detail_transaksi = $this->createDetailTransaksi($transaksi->id, $item['id_produk'], $item['quantity']);
            $produk = Produk::find($item['id_produk']);
            if ($produk) {
                $produk->decrement('stok', $item['quantity']);
            } else {
                return redirect()->route('produks.index')->with('error', 'Produk tidak ditemukan.');
            }
        }

        // Clear the session cart
        session()->forget('cart');

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
        return redirect()->route('transaksis.index')->with('success', 'Transaksi telah dihapus.');
    }

    private function createDetailTransaksi($transaksiId, $id_produk, $quantity)
    {
        return DetailTransaksi::create([
            'id_transaksi' => $transaksiId,
            'id_produk' => $id_produk,
            'quantity' => $quantity,
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

    public function cart(Request $request)
    {
        $item = [
            'id_transaksi' => $request->id_transaksi,
            'id_produk' => $request->id_produk,
            'quantity' => $request->quantity,
        ];
        
        $cart = session('cart', []);

        if (!collect($cart)->contains('id_produk', $request->id_produk)) {
            array_push($cart, $item);
            session(['cart' => $cart]);
        } else {
            foreach ($cart as $index => $cartItem) {
                if ($cartItem['id_produk'] == $request->id_produk) {
                    $cart[$index]['quantity'] += $request->quantity;
                    break;
                }
            }
            session(['cart' => $cart]);
        }

        return redirect()->route('produks.index')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->route('produks.index')->with('success', 'Keranjang berhasil dikosongkan.');
    }
}
