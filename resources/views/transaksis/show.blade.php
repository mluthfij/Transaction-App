@extends('app')

@section('title', 'Show Transaksi')

@section('content')
<div>
    <h1 class="mb-4 text-center">Transaksi</h1>

    <p><strong>Kode Transaksi:</strong> {{ $transaksi['kode_transaksi'] }} </p>
    <p><strong>tanggal:</strong> {{ $transaksi['tanggal'] }} </p>

    <a href="{{ route('produks.index') }}">List Produk</a>
</div>
@endsection
