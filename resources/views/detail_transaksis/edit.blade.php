@extends('app')

@section('title', 'Edit Detail Transaksi')

@section('content')
<div class="my-4">
    <h1 class="mb-4 text-center">Edit Detail Transaksi</h1>

    <form action="{{ route('detail_transaksis.update', $detail_transaksi->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <p>Kode Transaksi: {{ $detail_transaksi->transaksi->kode_transaksi }}</p>
        </div>

        <div class="">
            <p>Nama Produk: {{ $detail_transaksi->produk->produk }}</p>
        </div>

        <div class="mb-4">
            <label for="quantity" class="block text-gray-700">Quantity:</label>
            <input type="number" name="quantity" id="quantity" class="border border-gray-300 rounded p-2 w-full" required value="{{ $detail_transaksi->quantity }}">
        </div>

        <div class="d-flex flex-row">
            <div class="col">
                <a href="{{ route('produks.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
            <div class="col text-end">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
