@extends('pages.auth.template-auth')

@section('title')
    <title>Otaku Store | Login Page</title>
@endsection

@section('content')
    <div class="container my-4 py-4">
        <div class="row py-5 my-5 d-flex justify-content-between">

            <div class="col-md-4 mx-auto my-4 mb-3">
                <h3 class="text-white fw-bold">Selamat datang kembali..!</h3>
                <span class="text-white">Jangan lupa bahagia hari ini 😊</span>
                <img src="{{ asset('images/anya-dance.gif') }}" width="30" alt="">

                <div class="card mt-3">
                    <div class="card-body p-4">
                        <form action="{{ route('do.login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label text-dark-theme">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" aria-describedby="emailHelp">
                                @error('email')
                                    <div id="emailHelp" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label text-dark-theme">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" id="password">
                                @error('password')
                                    <div id="passwordHelp" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <p>
                                Belum punya akun?
                                <a href="{{ route('register.page') }}" class="link-sign fw-bold"><span>Daftar
                                        disini</span></a>
                            </p>
                            <a href="{{ route('home.page') }}" class="btn btn-cancel">Batal</a>
                            <button type="submit" class="btn btn-theme">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6 d-flex mb-3 img-hidden">
                <img src="{{ asset('icons/otaku-store-id-logo.png') }}" class="img-fluid my-auto" alt="Logo otaku store"
                    title="Logo Otaku Store">
            </div>

        </div>
    </div>
@endsection
