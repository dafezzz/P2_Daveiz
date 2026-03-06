@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <h4 class="mb-3">Management Jamaah</h4>

    {{-- FILTER --}}
    <form method="GET" class="row mb-3">

        <div class="col-md-3">
            <input type="text" name="search" class="form-control"
                   placeholder="Search name..." value="{{ request('search') }}">
        </div>

        <div class="col-md-3">
            <select name="status" class="form-control">
                <option value="">All Status</option>
                <option value="pending">Pending</option>
                <option value="revisi">Revisi</option>
                <option value="confirmed">Confirmed</option>
                <option value="cancelled">Cancelled</option>
            </select>
        </div>

        <div class="col-md-3">
            <select name="package_id" class="form-control">
                <option value="">All Package</option>
                @foreach($packages as $package)
                    <option value="{{ $package->id }}">
                        {{ $package->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <button class="btn btn-primary">Filter</button>
        </div>
    </form>

    {{-- TABLE --}}
    <div class="card">
        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Package</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($jamaahs as $jamaah)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $jamaah->full_name }}</td>
                        <td>{{ $jamaah->package->name ?? '-' }}</td>
                        <td>
                            <span class="badge bg-{{ 
                                $jamaah->status == 'pending' ? 'warning' :
                                ($jamaah->status == 'confirmed' ? 'success' :
                                ($jamaah->status == 'revisi' ? 'danger' : 'secondary'))
                            }}">
                                {{ ucfirst($jamaah->status) }}
                            </span>
                        </td>
                        <td>{{ $jamaah->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ route('admin.jamaahs.show', $jamaah->id) }}"
                               class="btn btn-sm btn-info">Detail</a>

                            <form action="{{ route('admin.jamaahs.destroy', $jamaah->id) }}"
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Delete?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $jamaahs->withQueryString()->links() }}

        </div>
    </div>

</div>
@endsection