@extends('app')

@section('title', 'List Produk')

@section('content')
<div class="my-4">
    <h1 class="mb-4 text-center">List Produk</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($produks as $produk)
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a class="text-decoration-none" href="{{ route('produks.show', $produk->id) }}">{{ $produk['produk'] }}</a>
                        </h5>
                        <span class="card-text"><strong>Harga</strong>: {{ 'Rp.' . number_format($produk->harga, 0, ',', '.') }}</span><br>
                        <span class="card-text"><strong>Stok</strong>: {{ $produk['stok'] }}</span>

                        <form class="text-end" action="{{ route('transaksis.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                            <input type="hidden" name="stok" value="{{ $produk->stok }}">

                            <div class="input-group my-3">
                                <input type="number" class="form-control" name="quantity" value="{{ $produk->stok === 0 ? 0 : 1 }}" min="1" max="{{ $produk->stok }}" {{ $produk->stok === 0 ? 'disabled' : '' }}>
                                <button class="btn btn-outline-primary {{ $produk->stok === 0 ? 'disabled' : '' }}" type="submit">Beli</button>
                              </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <a href="{{ route('produks.new') }}" class="btn btn-primary my-4">Tambah Produk</a>
</div>
@endsection
