@extends('app')

@section('title', 'Show Produk')

@section('content')
<div class="my-4">
    <h1 class="mb-4 text-center">Produk</h1>

    <p><strong>Produk:</strong> {{ $produk['produk'] }} </p>
    <p><strong>Stok:</strong> {{ $produk['stok'] }} </p>
    <p><strong>Harga:</strong> {{ $produk['harga'] }} </p>

    <a href="{{ route('produks.index') }}" class="btn btn-secondary my-4">List Produk</a>
</div>
@endsection
