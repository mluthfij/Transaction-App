<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::all();
        return view('produks.index', compact('produks'));
    }

    /**
     * Display new form.
     */
    public function new()
    {
        return view('produks.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        $produk = Produk::create($request->all());

        return redirect()->route('produks.show', $produk->id)->with('success', 'Produk created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produk = Produk::find($id);
        return view('produks.show', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'produk' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        $produk = Produk::find($id);
        $produk->update($request->all());

        return redirect()->route('produks.show', $produk->id)->with('success', 'Produk updated successfully.');
    }

    /**
     * Display the specified resource for edit page.
     */
    public function edit(string $id)
    {
        $produk = Produk::find($id);
        return view('produks.edit', compact('produk'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        return redirect()->route('produks.index')->with('success', 'Produk telah dihapus.');
    }
}
