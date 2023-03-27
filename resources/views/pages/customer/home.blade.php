{{-- Ekstend Template Customer --}}
@extends('layouts.template-customer')

@section('title')
    <title>Otaku Store | Shopping Figure, Merchandise and More</title>
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
    <!--  intro  -->
    <section class="mt-5">
        <div class="container">
            <main class="card p-3 shadow-2-strong">
                <div class="row">
                    <div class="col-lg-4 d-flex mb-3">
                        <div class="card-banner h-auto p-5 bg-theme rounded-5" style="height: 350px;">
                            <div>
                                <h2 class="text-white">
                                    Selamat Datang <br />
                                    Otaku-fans 🔥
                                </h2>
                                <p class="text-white text-justify">Selamat berbelanja, jangan lupakan promo menarik dari
                                    kami yah. Jangan
                                    lupa juga untuk GWS hari ini 😊</p>
                                <img src="{{ asset('images/anya-dance-2.gif') }}" width="180" alt=""> <br>
                                <a href="#" class="btn btn-theme-two shadow-0 mt-4"> Cek Produk Skuy </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div id="carouselExampleIndicators" class="carousel slide" data-mdb-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="{{ asset('images/banners/banner-04.webp') }}" class="d-block w-100 rounded"
                                        alt="" />
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('images/banners/banner-02.webp') }}" class="d-block w-100 rounded"
                                        alt="" />
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('images/banners/banner-03.webp') }}" class="d-block w-100 rounded"
                                        alt="" />
                                </div>
                                <div class="carousel-item">
                                    <img src="{{ asset('images/banners/banner-01.webp') }}" class="d-block w-100 rounded"
                                        alt="" />
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-mdb-target="#carouselExampleIndicators" data-mdb-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-mdb-target="#carouselExampleIndicators" data-mdb-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <!-- container end.// -->
    </section>
    <!-- intro -->

    <!-- Figure -->
    <section id="figure">
        <div class="container my-5">

            {{-- pengkondisian jika data kosong --}}
            @if ($figure_count != 0)
                <div class="row">
                    <div class="col-md-3">
                        <div class="alert alert-success" role="alert">
                            <h3 class="text-center">Figure</h3>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="slider owl-carousel owl-theme">

                    @foreach ($figure as $item)
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

        </div>
    </section>
    <!-- End Figure -->

    <!-- Manga -->
    <section id="manga">
        <div class="container my-5">

            {{-- pengkondisian jika data kosong --}}
            @if ($manga_count != 0)
                <div class="row">
                    <div class="col-md-3">
                        <div class="alert alert-danger" role="alert">
                            <h3 class="text-center">Manga</h3>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="slider owl-carousel owl-theme">

                    @foreach ($manga as $item)
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

        </div>
    </section>
    <!-- Manga -->

    <!-- Nendoroid -->
    <section id="nendoroid">
        <div class="container my-5">

            {{-- pengkondisian jika data kosong --}}
            @if ($nendoroid_count != 0)
                <div class="row">
                    <div class="col-md-3">
                        <div class="alert alert-primary" role="alert">
                            <h3 class="text-center">Nendoroid</h3>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="slider owl-carousel owl-theme">

                    @foreach ($nendoroid as $item)
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

        </div>
    </section>
    <!-- Nendoroid -->

    <!-- Merchandise -->
    <section id="merchandise">
        <div class="container my-5">

            {{-- pengkondisian jika data kosong --}}
            @if ($merchandise_count != 0)
                <div class="row">
                    <div class="col-md-3">
                        <div class="alert alert-warning" role="alert">
                            <h3 class="text-center">Merchandise</h3>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="slider owl-carousel owl-theme">

                    @foreach ($merchandise as $item)
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

        </div>
    </section>
    <!-- Merchandise -->

    <!-- Accessories -->
    <section id="accessories">
        <div class="container my-5">

            {{-- pengkondisian jika data kosong --}}
            @if ($accessories_count != 0)
                <div class="row">
                    <div class="col-md-3">
                        <div class="alert alert-info" role="alert">
                            <h3 class="text-center">Accessories</h3>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="slider owl-carousel owl-theme">

                    @foreach ($accessories as $item)
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

        </div>
    </section>
    <!-- Accessories -->
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
