@extends('layouts.template-admin')

@section('title')
    <title>Otaku Store | Profile {{ Auth::user()->name }}</title>
@endsection

@php
    function timestampConversion($timestamp)
    {
        // Format tanggal dan waktu asli
        $dateString = $timestamp;
    
        // Mengkonversi format menjadi waktu yang mudah dibaca
        $data = strtotime($dateString);
        $date = date('d-m-Y', $data);
        $time = date('H:i:s', $data);
    
        // konversi tanggal
        $month = [1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $slug = explode('-', $date);
        $result_date = $slug[0] . ' ' . $month[(int) $slug[1]] . ' ' . $slug[2];
    
        $result = $result_date . ' ' . '(' . $time . ')';
        return $result;
    }
@endphp

@section('content')
    <div class="container py-5">

        {{-- check error validation --}}
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <div class="card card-hover">
            <div class="card-body">
                <div class="row justify-content-around">
                    <div class="col-md-5">
                        <div class="card border mt-4">
                            <div class="my-auto pt-5">
                                {{-- jika user tidak memiliki foto --}}
                                @if (Auth::user()->photo == 'empty')
                                    <img src="{{ asset('images/admin-profile.png') }}" alt=""
                                        class="img-fluid rounded-circle-img border bg-theme p-1">
                                @else
                                    {{-- jika user memiliki foto --}}
                                    <img src="{{ Storage::url(Auth::user()->photo) }}" alt=""
                                        class="img-fluid rounded-circle-img border bg-theme p-1">
                                @endif
                            </div>
                            <div class="pt-3 pb-4 mx-5">

                                <form method="POST" action="{{ route('update.user', Auth::user()->id) }}"
                                    enctype="multipart/form-data">
                                    @method('put')
                                    @csrf

                                    <div class="input-gropup mb-3">
                                        <input type="file" class="form-control" id="photo" name="photo">
                                    </div>
                                    {{-- </form> --}}

                                    <center>
                                        <span>Last updated : {{ timestampConversion(Auth::user()->updated_at) }}</span>
                                    </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card border mt-4">
                            <div class="card-body">
                                <div class="card-title font-weight-bold">
                                    User profile information
                                </div>

                                <form method="POST" action="{{ route('update.user', Auth::user()->id) }}"
                                    enctype="multipart/form-data">
                                    @method('put')
                                    @csrf

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Username</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ Auth::user()->name }}">
                                        @if ($errors->has('name'))
                                            <div class="invalid feedback text-danger mb-3">
                                                *field nama harus di isi
                                            </div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email address</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ Auth::user()->email }}">
                                        @if ($errors->has('email'))
                                            <div class="invalid feedback text-danger mb-3">
                                                *field email harus di isi
                                            </div>
                                        @endif
                                    </div>

                                    {{-- <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirm" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirm" name="confirm">
                                    </div> --}}

                                    <a href="{{ route('admin.page') }}" class="btn btn-theme-two">Batal</a>
                                    <button type="submit" class="btn btn-theme">Ubah Data</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
