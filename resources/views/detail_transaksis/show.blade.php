@extends('app')

@section('title', 'Show Detail Transaksi')

@section('content')
<div class="my-4">
    <h1 class="mb-4 text-center">Detail Transaksi</h1>

    <table class="table table-bordered">
        <thead>
            <tr class="table-secondary">
                <th colspan="6">No Transaksi: <span style="font-weight: normal;">{{ $detail_transaksi->transaksi->kode_transaksi }}</span></th>
            </tr>
            <tr class="table-secondary">
                <th colspan="6">Tanggal: <span style="font-weight: normal;">{{ $detail_transaksi->transaksi->tanggal }}</span></th>
            </tr>
            <tr class="table-primary">
                <th>Produk</th>
                <th>Quantity</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $detail_transaksi->produk->produk }}</td>
                <td>{{ $detail_transaksi->quantity }}</td>
                <td>{{ 'Rp.' . number_format($detail_transaksi->produk->harga, 0, ',', '.') }}</td>
                <td>{{ 'Rp.' . number_format($detail_transaksi->produk->harga * $detail_transaksi->quantity, 0, ',', '.') }}</td>
                <td>
                    <div class="d-flex">
                        <form action="{{ route('detail_transaksis.destroy', $detail_transaksi->id) }}" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus detail transaksi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
