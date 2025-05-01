@extends('app')

@section('title', 'Show Transaksi')

@section('content')
<div class="my-4">
    <h1 class="mb-4 text-center">Transaksi</h1>

    <p><strong>Kode Transaksi:</strong> {{ $transaksi['kode_transaksi'] }} </p>
    <p><strong>tanggal:</strong> {{ $transaksi['tanggal'] }} </p>

    <a href="{{ route('produks.index') }}" class="btn btn-secondary my-4">List Produk</a>
</div>
@endsection
