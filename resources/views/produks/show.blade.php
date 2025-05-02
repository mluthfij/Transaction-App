@extends('app')

@section('title', 'Show Produk')

@section('content')
<div class="my-4">
    <h1 class="mb-4 text-center">Produk</h1>

    <p><strong>Produk:</strong> {{ $produk['produk'] }} </p>
    <p><strong>Stok:</strong> {{ $produk['stok'] }} </p>
    <p><strong>Harga:</strong> {{ 'Rp.' . number_format($produk['harga'], 0, ',', '.') }} </p>

    <div class="d-flex my-4">
        <a href="{{ route('produks.index') }}" class="btn btn-secondary me-2">List Produk</a>

        <a href="{{ route('produks.edit', $produk->id) }}" class="btn btn-warning me-2">Edit</a>

        <form action="{{ route('produks.destroy', $produk->id) }}" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus produk ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger me-2">Delete</button>
        </form>
    </div>
</div>
@endsection
