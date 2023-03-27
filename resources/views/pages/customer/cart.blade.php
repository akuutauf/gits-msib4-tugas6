@extends('layouts.template-customer')

@section('title')
    <title>Otaku Store | Chart Product Lists</title>
@endsection

@section('css')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
@endsection

@php
    // fungsi konversi data tipe date ke tanggal
    function dateConversion($date)
    {
        $month = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $slug = explode('-', $date);
        return $slug[2] . ' ' . $month[(int) $slug[1]] . ' ' . $slug[0];
    }
    
    function priceConversion($price)
    {
        $formattedPrice = number_format($price, 0, ',', '.');
        return $formattedPrice;
    }
@endphp


@section('content')
    <!-- cart + summary -->
    <section class="my-5">
        <div class="container">
            <div class="row">
                <!-- cart -->
                <div class="col-lg-9">
                    <div class="card border shadow-sm card-hover">
                        <div class="m-4">
                            <h4 class="card-title mb-4">Daftar Produk Keranjang Ku</h4>

                            @foreach ($products as $item)
                                <div class="row gy-3 mb-4">
                                    <div class="col-lg-7">
                                        <div class="me-lg-5">
                                            <div class="d-flex pt-3">
                                                <img src="{{ $item->foto }}" class="border rounded me-3"
                                                    style="width: 96px; height: 96px;" />
                                                <div class="">
                                                    <a href="#" class="nav-link pt-2 fw-bold">{{ $item->name }}</a>
                                                    <p class="text-muted">Releases:
                                                        {{ dateConversion($item->release_date) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 d-flex flex-row flex-lg-column flex-xl-row text-nowrap">
                                        <div class="pt-2">
                                            <small class="text-muted text-nowrap"> IDR
                                                {{ priceConversion($item->price) }} /
                                                per item
                                            </small> <br>
                                            <span class="h6 fw-bold">Total : IDR
                                                {{ priceConversion($item->total_price) }}</span>

                                            {{-- Start form --}}
                                            <form action="{{ route('update.cart', $item->id) }}" method="POST">
                                                @method('put')
                                                @csrf

                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input mt-2" id="exampleCheck1"
                                                        checked="yes">
                                                    <input type="number" class="form-control mt-3" id="quantity"
                                                        name="quantity" value="{{ $item->quantity }}" min="1"
                                                        max="99">
                                                </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-1 justify-content-center">
                                        <div class="float-md-start pt-3">

                                            <button type="submit" class="btn btn-theme px-2 icon-hover-primary">
                                                <i class="fa-solid fa-check fa-lg px-1"></i>
                                            </button>
                                            </form>

                                            <a href="{{ route('delete.cart', $item->id) }}"
                                                class="btn btn-theme-two px-2 icon-hover-primary">
                                                <i class="fa-solid fa-trash fa-lg px-1"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <!-- cart -->

                <!-- summary -->
                <div class="col-lg-3">
                    <div class="card shadow-sm border card-hover">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Total harga:</p>
                                <p class="mb-2">IDR 300.000</p>
                            </div>
                            {{-- <div class="d-flex justify-content-between">
                                <p class="mb-2">Discount:</p>
                                <p class="mb-2 text-success">-$60.00</p>
                            </div> --}}
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Admin:</p>
                                <p class="mb-2">IDR: 2.500</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="mb-2">Delivery:</p>
                                <p class="mb-2">IDR: 35.000</p>
                            </div>
                            <hr />
                            <div class="d-flex justify-content-between">
                                <p class="mb-2 fw-bold">Total :</p>
                                <p class="mb-2 fw-bold">IDR 337.500</p>
                            </div>

                            <div class="mt-3">
                                <a href="#" class="btn btn-theme w-100 shadow-0 mb-2"> Beli Sekarang </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- summary -->
            </div>
        </div>
    </section>
    <!-- cart + summary -->
    <section>
        <div class="container my-5">
            <header class="">
                <h3>Popular Product</h3>
            </header>

            <div class="row">
                <div class="slider owl-carousel owl-theme">

                    @foreach ($product_ready as $item)
                        <form action="{{ route('store.cart', $item->id) }}" method="POST">
                            @csrf

                            <div class="item col-md-12 d-flex justify-content-center p-2">
                                <div class="card my-2 shadow-sm p-4 card-hover">
                                    <a href="#!" class="img-wrap">
                                        <img src="{{ $item->foto }}" class="card-img-top rounded"
                                            title="{{ $item->name }}" style="aspect-ratio: 1 / 1">
                                    </a>
                                    <div class="card-body p-0 pt-2">
                                        <h6 class="card-title mt-2 pt-2 limit-text" title="{{ $item->name }}">
                                            <b>{{ $item->name }}</b>
                                        </h6>

                                        @if ($carts->contains('product_id', $item->id))
                                            {{-- button disable --}}
                                            <button type="submit"
                                                class="btn cart-disable border px-2 mx-1 pt-2 float-end disabled">
                                                <i class="fas fa-shopping-cart fa-lg px-1"></i>
                                            </button>
                                        @else
                                            {{-- button normal --}}
                                            <button type="submit"
                                                class="btn btn-light border px-2 mx-1 pt-2 float-end icon-cart-hover">
                                                <i class="fas fa-shopping-cart fa-lg px-1 text-secondary"></i>
                                            </button>
                                        @endif

                                        <a href=""
                                            class="btn btn-light border px-2 mx-1 pt-2 float-end icon-heart-hover">
                                            <i class="fas fa-heart fa-lg px-1 text-secondary"></i>
                                        </a>
                                        {{-- Pengkondisian status product --}}
                                        @if ($item->status == 'Ready')
                                            <div class="btn ready-content">
                                                {{ $item->status }}
                                            </div>
                                        @elseif ($item->status == 'Pre-Order')
                                            <div class="btn pre-order-content">
                                                {{ $item->status }}
                                            </div>
                                        @elseif ($item->status == 'Run Out')
                                            <div class="btn run-out-content">
                                                {{ $item->status }}
                                            </div>
                                        @endif
                                        <p class="card-text mb-0 text-theme-two pt-2"><b>IDR
                                                {{ priceConversion($item->price) }}</b></p>
                                        <p class="text-muted fs-20">
                                            Releases: {{ dateConversion($item->release_date) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endforeach

                </div>

            </div>
    </section>
    <!-- Recommended -->
@endsection

@section('script')
    <script>
        $(".slider").owlCarousel({
            center: false,
            items: 2,
            loop: true,
            margin: 5,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                },
            }
        });
    </script>
@endsection
