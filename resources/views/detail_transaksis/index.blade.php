@extends('app')

@section('title', 'List Detail Transaksi')

@section('content')
<div class="my-4">
    <h1 class="mb-4 text-center">List Detail Transaksi</h1>

    <div class="table-container">
        @foreach ($detail_transaksis as $detail_transaksi)
            <table class="table table-bordered">
                <thead>
                    <tr class="table-secondary">
                        <th colspan="6">No Transaksi: <span style="font-weight: normal;">{{ $detail_transaksi->transaksi->kode_transaksi }}</span></th>
                    </tr>
                    <tr class="table-secondary">
                        <th colspan="6">Tanggal: <span style="font-weight: normal;">{{ $detail_transaksi->transaksi->tanggal }}</span></th>
                    </tr>
                    <tr class="table-primary">
                        <th>No</th>
                        <th>Produk</th>
                        <th>Quantity</th>
                        <th>Harga</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $detail_transaksi->produk->produk }}</td>
                        <td>{{ $detail_transaksi->quantity }}</td>
                        <td>{{ $detail_transaksi->produk->harga }}</td>
                        <td>{{ $detail_transaksi->produk->harga * $detail_transaksi->quantity }}</td>
                        <td><a href="{{ route('detail_transaksis.show', $detail_transaksi->id) }}" class="btn btn-primary btn-sm">Show</a></td>
                    </tr>
                </tbody>
            </table>
        @endforeach
    </div>
</div>
@endsection
