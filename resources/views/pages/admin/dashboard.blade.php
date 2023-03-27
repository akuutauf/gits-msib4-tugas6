@extends('layouts.template-admin')

@section('title')
    <title>Otaku Store | Manajemen Produk & Kategori</title>
@endsection

@section('content')
    <!-- Header -->
    <div class="header pb-6">
        <div class="container-fluid">
            <div class="header-body">

                {{-- content --}}
                <!-- Card stats -->
                <div class="row py-5">
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <a href="{{ route('index.product') }}">
                                <!-- Card body -->
                                <div class="card-body card-hover">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Manajemen Product</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $productsCount }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                                <i class="fa-solid fa-splotch"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-nowrap">Panel CRUD Product</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                            <a href="{{ route('index.category') }}">
                                <!-- Card body -->
                                <div class="card-body card-hover">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Manajemen Category</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ $categoriesCount }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                                <i class="fa-solid fa-tags"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-3
                                                mb-0 text-sm">
                                        <span class="text-nowrap">Panel CRUD Category</span>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- End content --}}

            </div>
        </div>
    </div>
@endsection
