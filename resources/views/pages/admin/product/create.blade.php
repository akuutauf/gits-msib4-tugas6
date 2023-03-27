@extends('layouts.template-admin')

@section('title')
    <title>Otaku Store | Product Create Page</title>
@endsection

@section('content')
    <div class="container py-5">

        {{-- manual check vaidation --}}
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <!-- Form controls -->
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
                <h3 class="mb-0">Form Tambah Product</h3>
                <p class="text-sm mb-0 mt-2">
                    Pada halaman ini Admin dapat menambahkan data product baru, yuk
                    kita tambah data produk bersama-sama 😊. Pastikan semua field terisi yah.
                </p>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <form action="{{ $action }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="name">Name</label>
                                <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                    id="name" placeholder="Nama Produk" name="name">
                            </div>
                            @if ($errors->has('name'))
                                <div class="invalid feedback text-danger mb-3">
                                    *field nama harus di isi
                                </div>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="category_id">Category</label>
                                <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                                    name="category_id">
                                    <option value="">Pilih Category Product</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('category_id'))
                                <div class="invalid feedback text-danger mb-3">
                                    *option category harus di pilih
                                </div>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="foto">Link Photo</label>
                                <input type="text" class="form-control @error('foto') is-invalid @enderror"
                                    id="foto" placeholder="Tambahkan Link Foto" name="foto">
                            </div>
                            @if ($errors->has('foto'))
                                <div class="invalid feedback text-danger mb-3">
                                    *field foto harus di isi
                                </div>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="price">Price</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror"
                                    id="price" placeholder="Harga Produk (Number)" name="price">
                            </div>
                            @if ($errors->has('price'))
                                <div class="invalid feedback text-danger mb-3">
                                    *field price harus di isi
                                </div>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="stock">Stock</label>
                                <input type="number" class="form-control @error('stock') is-invalid @enderror"
                                    id="stock" placeholder="Stok Produk (Number)" name="stock">
                            </div>
                            @if ($errors->has('stock'))
                                <div class="invalid feedback text-danger mb-3">
                                    *field stock harus di isi
                                </div>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="release_date">Release Date</label>
                                <input class="form-control @error('release_date') is-invalid @enderror" type="date"
                                    id="release_date" name="release_date">
                            </div>
                            @if ($errors->has('release_date'))
                                <div class="invalid feedback text-danger mb-3">
                                    *field release date harus di isi
                                </div>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3"
                                    name="description"></textarea>
                            </div>
                            @if ($errors->has('description'))
                                <div class="invalid feedback text-danger mb-3">
                                    *field description harus di isi
                                </div>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="status">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status"
                                    name="status">
                                    <option value="">Pilih Status Product</option>
                                    <option value="Ready">Ready</option>
                                    <option value="Pre-Order">Pre-Order</option>
                                    <option value="Run Out">Run Out</option>
                                </select>
                            </div>
                            @if ($errors->has('status'))
                                <div class="invalid feedback text-danger mb-3">
                                    *option status harus di pilih
                                </div>
                            @endif
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md">
                            <a href="{{ route('index.product') }}" class="btn btn-theme-two">Batal</a>
                            <button type="submit" class="btn btn-theme">Tambah
                                Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
