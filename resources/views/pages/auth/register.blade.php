@extends('pages.auth.template-auth')

@section('title')
    <title>Otaku Store | Register Page</title>
@endsection

@section('content')
    <div class="container my-2">
        <div class="row py-5 my-5">

            <div class="col-md-5 mx-auto my-2">
                <h3 class="text-white fw-bold">Segara daftarkan akun Anda..!</h3>
                <span class="text-white">Nikmati layanan dan promo menarik dari kami 🤩</span>
                <img src="{{ asset('images/anya-dance.gif') }}" width="30" alt="">

                <div class="card mt-3">
                    <div class="card-body p-4">
                        <form action="{{ route('do.register') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label text-dark-theme">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" id="name" aria-describedby="nameHelp" placeholder="username">
                                @error('name')
                                    <div id="nameHelp" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label text-dark-theme">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" aria-describedby="emailHelp" placeholder="email">
                                @error('email')
                                    <div id="emailHelp" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label text-dark-theme">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" id="password" placeholder="new password">
                                @error('password')
                                    <div id="passwordHelp" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label text-dark-theme">Password
                                    Confirmation</label>
                                <input type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation" id="password_confirmation" placeholder="confirm password">
                                @error('password_confirmation')
                                    <div id="passwordConfirmationHelp" class="form-text">{{ $message }}</div>
                                @enderror
                            </div>
                            <p>
                                Sudah punya akun?
                                <a href="{{ route('login.page') }}" class="link-sign fw-bold">Login disini</a>
                            </p>
                            <a href="{{ route('home.page') }}" class="btn btn-cancel">Batal</a>
                            <button type="submit" class="btn btn-theme">Daftar</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6 d-flex img-hidden">
                <img src="{{ asset('icons/otaku-store-id-logo.png') }}" class="img-fluid my-auto" alt="Logo otaku store"
                    title="Logo Otaku Store">
            </div>

        </div>
    </div>
@endsection
