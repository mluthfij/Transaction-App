@extends('app')

@section('title', 'List Produk')

@section('content')
<div class="my-4">
    <div class="mb-4">
        <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    Keranjang Belanja
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                <div class="accordion-body">
                    @if (empty(session('cart')))
                        Silahkan pilih produk yang ingin dibeli dan masukkan ke dalam keranjang belanja. Setelah itu, Anda dapat melakukan checkout untuk menyelesaikan transaksi.
                    @else
                    <ol class="list-group list-group-numbered mb-3">
                        @foreach (session('cart', []) as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">{{ $produks->find($item['id_produk'])->produk }}</div>
                                </div>
                                <span class="badge text-bg-primary rounded-pill">{{ $item['quantity'] }}</span>
                            </li>
                        @endforeach
                    </ol>


                    <form action="{{ route('transaksis.store') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-primary">Checkout</button>
                    </form>

                    <form action="{{ route('transaksis.clear') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Clear Cart</button>
                    </form>
                    @endif

                </div>
            </div>
            </div>
        </div>
    </div>

    <h1 class="mb-4 text-center">List Produk</h1>

    @if ($produks->isEmpty())
        <div class="alert alert-info" role="alert">
            Data Produk Belum Tersedia.
        </div>
    @else
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

                            <form class="text-end" action="{{ route('transaksis.cart') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id_produk" value="{{ $produk->id }}">
                                <input type="hidden" name="stok" value="{{ $produk->stok }}">

                                <div class="input-group my-3">
                                    <input type="number" class="form-control" name="quantity" value="{{ $produk->stok === 0 ? 0 : 1 }}" min="1" max="{{ $produk->stok }}" {{ $produk->stok === 0 ? 'disabled' : '' }}>
                                    <button class="btn btn-outline-primary {{ $produk->stok === 0 ? 'disabled' : '' }}" type="submit">Masuk Keranjang</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <a href="{{ route('produks.new') }}" class="btn btn-primary my-4">Tambah Produk</a>
</div>
@endsection
