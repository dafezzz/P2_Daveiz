@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-5 col-lg-6 col-md-7">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-5">

                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <input type="email" name="email" class="form-control form-control-user"
                               placeholder="Email" required autofocus>
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-user"
                               placeholder="Password" required>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox small">
                            <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                            <label class="custom-control-label" for="remember">Remember Me</label>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-user btn-block">
                        Login
                    </button>
                </form>

                <hr>

                <div class="text-center">
                    <a class="small" href="{{ route('register') }}">Buat akun</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
