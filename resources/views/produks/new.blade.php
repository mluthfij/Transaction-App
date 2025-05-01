@extends('app')

@section('title', 'List Produk')

@section('content')
<div>
    <h1 class="mb-4 text-center">Tambah Produk Baru</h1>

    <form action="{{ route('produks.store') }}" method="post">
        @csrf
        <div class="mb-4">
            <label for="produk" class="block text-gray-700">Nama Produk:</label>
            <input type="text" name="produk" id="produk" class="border border-gray-300 rounded p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="stok" class="block text-gray-700">Stok:</label>
            <input type="number" name="stok" id="stok" class="border border-gray-300 rounded p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label for="harga" class="block text-gray-700">Harga:</label>
            <input type="number" name="harga" id="harga" class="border border-gray-300 rounded p-2 w-full" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('produks.index') }}">Kembali</a>
    </form>
</div>
@endsection
