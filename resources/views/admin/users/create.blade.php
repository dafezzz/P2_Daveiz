@extends('layouts.app')
@section('title','Tambah User')

@section('content')

<div class="mb-4">
    <h4 class="font-weight-bold text-dark mb-0">
        Tambah User
    </h4>
</div>

@if ($errors->any())
<div class="alert corporate-alert mb-4">
    <ul class="mb-0 pl-3">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card">
    <div class="card-body">

        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="row">

                <div class="col-md-6 mb-4">
                    <label class="form-label">
                        Nama Lengkap
                    </label>
                    <input type="text"
                           name="fullname"
                           value="{{ old('fullname') }}"
                           class="form-control"
                           required>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label">
                        Username
                    </label>
                    <input type="text"
                           name="username"
                           value="{{ old('username') }}"
                           class="form-control"
                           required>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label">
                        Email
                    </label>
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="form-control"
                           required>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label">
                        Password
                    </label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           required>
                </div>

                <div class="col-md-6 mb-4">
                    <label class="form-label">
                        Role
                    </label>
                    <select name="role_id"
                            class="form-control"
                            required>
                        <option value="">-- Pilih Role --</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}"
                                {{ old('role_id') == $role->id ? 'selected' : '' }}>
                                {{ ucfirst($role->name) }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="d-flex justify-content-end mt-2">
                <a href="{{ route('users.index') }}"
                   class="btn btn-light mr-2">
                    Kembali
                </a>

                <button type="submit"
                        class="btn btn-gold">
                    Simpan User
                </button>
            </div>

        </form>

    </div>
</div>

@endsection