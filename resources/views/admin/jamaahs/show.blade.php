@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <h4>Detail Jamaah</h4>

    <div class="card mb-3">
        <div class="card-body">

            <p><strong>Nama:</strong> {{ $jamaah->full_name }}</p>
            <p><strong>Package:</strong> {{ $jamaah->package->name ?? '-' }}</p>
            <p><strong>Status:</strong> {{ $jamaah->status }}</p>

            <hr>

            <form method="POST"
                  action="{{ route('admin.jamaahs.updateStatus', $jamaah->id) }}">
                @csrf
                @method('PATCH')

                <select name="status" class="form-control mb-2">
                    <option value="pending">Pending</option>
                    <option value="revisi">Revisi</option>
                    <option value="confirmed">Confirmed</option>
                    <option value="cancelled">Cancelled</option>
                </select>

                <button class="btn btn-success">Update Status</button>
            </form>

        </div>
    </div>

</div>
@endsection