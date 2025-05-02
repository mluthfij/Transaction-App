@extends('app')

@section('title', 'List Transaksi')

@section('content')
<div class="my-4">
    <h1 class="mb-4 text-center">List Transaksi</h1>

    @if ($transaksis->isEmpty())
        <div class="alert alert-info" role="alert">
            Data Detail Transaksi Belum Tersedia.
        </div>
    @else
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
                                <div class="d-flex">
                                    <a href="{{ route('transaksis.show', $transaksi->id) }}" class="btn btn-primary btn-sm me-2">Show</a>
                                    <a href="{{ route('transaksis.edit', $transaksi->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>

                                    <form action="{{ route('transaksis.destroy', $transaksi->id) }}" method="post"  onsubmit="return confirm('Apakah anda yakin ingin menghapus transaksi ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
    @endif

    <a href="{{ route('produks.index') }}" class="btn btn-secondary my-4">Kembali</a>
</div>
@endsection
