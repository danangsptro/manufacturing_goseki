@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="wrapper">
            <div class="logo">
                <img src="{{ asset('assets/img/suratmasuj.png') }}" alt="">
            </div>
            <div class="text-center mt-4 name">
                Login
            </div>
            <p class="text-center mt-2">
                Program Surat Masuk & Keluar

            </p>
            <form method="POST" action="{{ route('login') }}" class="p-3 mt-3">
                @csrf
                <div class="form-field align-items-center">
                    <span class="far fa-user"></span>
                    <input id="username" type="username"
                        class="form-control form-control-user @error('username') is-invalid @enderror" name="username"
                        value="{{ old('username') }}" required autocomplete="username" autofocus
                        placeholder="Username or Email">

                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-field align-items-center">
                    <span class="fas fa-key"></span>
                    <input id="password" type="password"
                        class="form-control form-control-user @error('password') is-invalid @enderror" name="password"
                        required autocomplete="current-password" placeholder="Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button class="btn mt-3" type="submit">Login</button>
            </form>
        </div>
    </div>
@endsection
