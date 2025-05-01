@extends('app')

@section('title', 'List Transaksi')

@section('content')
<div>
    <h1 class="mb-4 text-center">List Transaksi</h1>

    <table class="table-auto border-collapse border border-gray-400">
        <thead>
            <tr>
                <th class="border border-gray-300 py-1">Kode Transaksi</th>
                <th class="border border-gray-300 py-1">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transaksis as $transaksi)
                <tr>
                    <td class="border border-gray-300 py-1 px-2">{{ $transaksi['kode_transaksi'] }}</td>
                    <td class="border border-gray-300 py-1 px-2">{{ $transaksi['tanggal'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
