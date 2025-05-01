@extends('app')

@section('title', 'List Transaksi')

@section('content')
<div class="my-4">
    <h1 class="mb-4 text-center">List Transaksi</h1>

    <div class="table-container">
        <table class="table table-bordered table-striped">
            <thead>
                <tr class="table-primary">
                    <th>No</th>
                    <th>Kode Transaksi</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksis as $transaksi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $transaksi['kode_transaksi'] }}</td>
                        <td>{{ $transaksi['tanggal'] }}</td>
                        <td>
                            <a href="{{ route('transaksis.show', $transaksi->id) }}" class="btn btn-primary btn-sm">Show</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>

    <a href="{{ route('produks.index') }}" class="btn btn-secondary my-4">Kembali</a>
</div>
@endsection
