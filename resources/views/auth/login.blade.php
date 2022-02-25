<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('bootstrap5/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/auth-custom.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <script src="{{ asset('bootstrap5/js/bootstrap.min.js')}}" defer></script>

    <title>Login landing page</title>

</head>
<body>
    <section class="side">
        <img class="side-img-1" src="{{ asset('assets/img/SeekPng.com_laptops-png_2143849.png') }}" alt="">
        <img class="side-img-2" src="{{ asset('assets/img/usb.png') }}" alt="">
    </section>

    <section class="main">
        <div class="login-container">
            <div class="title text-center pb-4">
                <img class="card-img-top logo-img" src="{{ asset('assets/img/APTI_Logo.png') }}" alt="">
                <h3 class="card-title fw-bold text-warning pb-2">Welcome Back</h3>
                <h6 class="card-subtitle fw-bolder">Please sign in to continue</h6>
            </div>
            <div class="login-container-body row">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group" >
                        <label for="email" class="text-muted mb-2 fs-6">Email Address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email Address" name="email" value="{{ old('email') }}">
                        @error('email')
                            <span class="invalid-feedback" role="alert" align=right>
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-muted mb-2">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" name="password" value="{{ old('password') }}">
                        @error('password')
                            <span class="invalid-feedback" role="alert" align=right>
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group row" style="padding: 0 12px">
                        <button class="btn btn-block btn-warning text-white submit">Sign In</button>
                    </div>
                </form>

            </div>
            <div class="card-footer text-center" style="border: none !important; background-color: transparent !important;">
                <div class="form-group mb-4">
                    <a href="#" class="fs-6 fw-bold text-warning" style="text-decoration: none;">Forgot password?</a>
                </div>
                {{-- <div class="form-group row">
                    <span class="fs-6 text-muted">Do you have a account?</span>
                    <a href="#" class="fs-6 fw-bold text-warning" style="text-decoration: none;">Create an Account</a>
                </div> --}}
            </div>
        </div>
    </section>

</body>
</html>
