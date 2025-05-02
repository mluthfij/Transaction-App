@extends('app')

@section('title', 'List Detail Transaksi')

@section('content')
<div class="my-4">
    <h1 class="mb-4 text-center">List Detail Transaksi</h1>

    @if ($detail_transaksis->isEmpty())
        <div class="alert alert-info" role="alert">
            Data Detail Transaksi Belum Tersedia.
        </div>
    @else
        @foreach ($transaksis as $transaksi)
            <table class="table table-bordered">
                <thead>
                    <tr class="table-secondary">
                        <th colspan="6">No Transaksi: <span style="font-weight: normal;">{{ $transaksi->kode_transaksi }}</span></th>
                    </tr>
                    <tr class="table-secondary">
                        <th colspan="6">Tanggal: <span style="font-weight: normal;">{{ $transaksi->tanggal }}</span></th>
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
                    @foreach ($detail_transaksis as $detail_transaksi)
                        @if ($detail_transaksi->id_transaksi == $transaksi->id)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $detail_transaksi->produk->produk }}</td>
                                <td>{{ $detail_transaksi->quantity }}</td>
                                <td>{{ 'Rp.' . number_format($detail_transaksi->produk->harga, 0, ',', '.') }}</td>
                                <td>{{ 'Rp.' . number_format($detail_transaksi->produk->harga * $detail_transaksi->quantity, 0, ',', '.') }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('detail_transaksis.show', $detail_transaksi->id) }}" class="btn btn-primary btn-sm me-2">Show</a>
                                        <a href="{{ route('detail_transaksis.edit', $detail_transaksi->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                                        
                                        <form action="{{ route('detail_transaksis.destroy', $detail_transaksi->id) }}" method="post" onsubmit="return confirm('Apakah anda yakin ingin menghapus detail transaksi ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @endforeach
    @endif
</div>
@endsection
