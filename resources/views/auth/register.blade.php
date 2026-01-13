@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-5 col-lg-6 col-md-7">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-5">

                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group">
                        <input type="text" name="name" class="form-control form-control-user"
                               placeholder="Nama" required>
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" class="form-control form-control-user"
                               placeholder="Email" required>
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-user"
                               placeholder="Password" required>
                    </div>

                    <div class="form-group">
                        <input type="password" name="password_confirmation"
                               class="form-control form-control-user"
                               placeholder="Ulangi Password" required>
                    </div>

                    <button class="btn btn-success btn-user btn-block">
                        Register
                    </button>
                </form>

                <hr>

                <div class="text-center">
                    <a class="small" href="{{ route('login') }}">Sudah punya akun?</a>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
