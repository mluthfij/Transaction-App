@extends('app')

@section('title', 'List Produk')

@section('content')
<div class="my-4">
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

        <div class="d-flex flex-row">
            <div class="col">
                <a href="{{ route('produks.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
            <div class="col text-end">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>
@endsection
