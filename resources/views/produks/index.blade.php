@extends('app')

@section('title', 'List Produk')

@section('content')
<div>
    <h1 class="mb-4 text-center">List Produk</h1>

    <table class="table-auto border-collapse border border-gray-400">
        <thead>
            <tr>
                <th class="border border-gray-300 py-1">Produk</th>
                <th class="border border-gray-300 py-1">Stok</th>
                <th class="border border-gray-300 py-1">Harga</th>
                <th class="border border-gray-300 py-1">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produks as $produk)
                <tr>
                    <td class="border border-gray-300 py-1 px-2">{{ $produk['produk'] }}</td>
                    <td class="border border-gray-300 py-1 px-2">{{ $produk['stok'] }}</td>
                    <td class="border border-gray-300 py-1 px-2">{{ $produk['harga'] }}</td>
                    <td class="border border-gray-300 py-1 px-2">
                        <form action="{{ route('transaksis.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                            <input type="hidden" name="stok" value="{{ $produk->stok }}">
                            <input type="number" name="quantity" value="1" min="1" max="{{ $produk->stok }}" class="w-16 border border-gray-300 rounded px-2">
                            <button type="submit" class="btn btn-primary">Beli</button>
                        </form> |
                        <a href="{{ route('produks.show', $produk->id) }}">Show</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('produks.new') }}" class="btn my-4">Tambah Produk</a>
</div>
@endsection
