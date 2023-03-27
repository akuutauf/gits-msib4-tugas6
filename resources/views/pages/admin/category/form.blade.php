@extends('layouts.template-admin')

@section('title')
    <title>Otaku Store | Category Create Page</title>
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
                <h3 class="mb-0">Form Tambah Category</h3>
                <p class="text-sm mb-0 mt-2">
                    Pada halaman ini Admin dapat menambahkan data category baru, yuk
                    kita tambah data category bersama-sama 😊. Pastikan semua field terisi yah.
                </p>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <form action="{{ $action }}" method="POST">
                    @method('put')
                    @csrf

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="name">Name</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    id="name" placeholder="Nama Category" name="name" value="{{ $category->name }}">
                            </div>
                            @if ($errors->has('name'))
                                <div class="invalid feedback text-danger mb-3">
                                    *field nama harus di isi
                                </div>
                            @endif
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label" for="status">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status"
                                    name="status">
                                    <option value="">Pilih Status Category</option>
                                    <option value="Aktif" {{ $category->status == 'Aktif' ? 'selected' : '' }}>Aktif
                                    </option>
                                    <option value="Tidak Aktif" {{ $category->status == 'Tidak Aktif' ? 'selected' : '' }}>
                                        Tidak
                                        Aktif</option>
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
                            <a href="{{ route('index.category') }}" class="btn btn-theme-two">Batal</a>
                            <button type="submit" class="btn btn-theme">Edit
                                Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
