@extends('layouts.app')
@section('title','Edit User')

@section('content')

<div class="mb-4">
    <h4 class="font-weight-bold text-dark mb-0">
        Edit User
    </h4>
</div>

<div class="card">
    <div class="card-body">

        <form action="{{ route('users.update', $user->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="font-weight-semibold">
                        Nama Lengkap
                    </label>
                    <input type="text"
                           name="fullname"
                           value="{{ $user->userable->people->fullname }}"
                           class="form-control"
                           required>
                </div>

                <div class="col-md-6 mb-4">
                    <label>Username</label>
                    <input type="text"
                           name="username"
                           value="{{ $user->username }}"
                           class="form-control"
                           required>
                </div>

                <div class="col-md-6 mb-4">
                    <label>Email</label>
                    <input type="email"
                           name="email"
                           value="{{ $user->email }}"
                           class="form-control"
                           required>
                </div>

                <div class="col-md-6 mb-4">
                    <label>Password
                        <small class="text-muted">
                            (Kosongkan jika tidak diganti)
                        </small>
                    </label>
                    <input type="password"
                           name="password"
                           class="form-control">
                </div>

                <div class="col-md-6 mb-4">
                    <label>Role</label>
                    <select name="role_id"
                            class="form-control"
                            required>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}"
                                {{ $user->roles->first()?->id == $role->id ? 'selected' : '' }}>
                                {{ ucfirst($role->name) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('users.index') }}"
                   class="btn btn-light mr-2">
                    Kembali
                </a>

                <button type="submit"
                        class="btn btn-gold">
                    Update User
                </button>
            </div>

        </form>

    </div>
</div>

@endsection