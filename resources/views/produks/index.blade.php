@extends('app')

@section('title', 'List Produk')

@section('content')
<div>
    <h1 class="mb-4 text-center">List Produk</h1>

    <table class="table-auto border-collapse border border-gray-400">
        <thead>
            <tr>
                <th class="border border-gray-300 py-1">Produk</th>
                <th class="border border-gray-300 py-1">Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produks as $produk)
                <tr>
                    <td class="border border-gray-300 py-1 px-2">{{ $produk['produk'] }}</td>
                    <td class="border border-gray-300 py-1 px-2">{{ $produk['harga'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
