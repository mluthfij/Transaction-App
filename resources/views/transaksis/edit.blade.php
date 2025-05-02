@extends('app')

@section('title', 'Edit Transaksi')

@section('content')
<div class="my-4">
    <h1 class="mb-4 text-center">Edit Transaksi</h1>

    <form action="{{ route('transaksis.update', $transaksi->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <p>Kode Transaksi: {{ $transaksi->kode_transaksi }}</p>
        </div>
        
        <div class="mb-4">
            <label for="tanggal" class="block text-gray-700">Tanggal:</label>
            <input type="date" name="tanggal" id="tanggal" class="border border-gray-300 rounded p-2 w-full" required value="{{ $transaksi->tanggal }}">
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
