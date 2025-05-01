@extends('app')

@section('title', 'Show Transaksi')

@section('content')
<div class="my-4">
    <h1 class="mb-4 text-center">Transaksi</h1>

    <p><strong>Kode Transaksi:</strong> {{ $transaksi['kode_transaksi'] }} </p>
    <p><strong>tanggal:</strong> {{ $transaksi['tanggal'] }} </p>

    <div class="d-flex my-4">
        <a href="{{ route('produks.index') }}" class="btn btn-secondary me-2">List Produk</a>

        <form action="{{ route('transaksis.destroy', $transaksi->id) }}" method="post"  onsubmit="return confirm('Apakah anda yakin ingin menghapus transaksi ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>
@endsection
