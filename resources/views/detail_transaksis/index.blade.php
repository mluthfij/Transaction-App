@extends('app')

@section('title', 'List Detail Transaksi')

@section('content')
<div>
    <h1 class="mb-4 text-center">List Detail Transaksi</h1>

    <table class="table-auto border-collapse border border-gray-400">
        <thead>
            <tr>
                <th class="border border-gray-300 py-1">Produk</th>
                <th class="border border-gray-300 py-1">Transaksi</th>
                <th class="border border-gray-300 py-1">Quantity</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detail_transaksis as $detail_transaksi)
                <tr>
                    <td class="border border-gray-300 py-1 px-2">{{ $detail_transaksi['id_produk'] }}</td>
                    <td class="border border-gray-300 py-1 px-2">{{ $detail_transaksi['id_transaksi'] }}</td>
                    <td class="border border-gray-300 py-1 px-2">{{ $detail_transaksi['quantity'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
