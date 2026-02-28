@extends('layouts.app')
@section('title','Tambah Package')

@section('content')
<div class="container-fluid">

    <h4 class="mb-4 font-weight-bold">Tambah Package</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('packages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">

            <div class="col-md-6 mb-3">
                <label>Nama Package</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="col-md-3 mb-3">
                <label>Type</label>
                <select name="type" class="form-control" required>
                    <option value="umrah">UMRAH</option>
                    <option value="haji">HAJI</option>
                </select>
            </div>

            <div class="col-md-3 mb-3">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="draft">DRAFT</option>
                    <option value="published">PUBLISHED</option>
                    <option value="closed">CLOSED</option>
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label>Harga</label>
                <input type="number" name="price" class="form-control" required>
            </div>

            <div class="col-md-4 mb-3">
                <label>Quota</label>
                <input type="number" name="quota" class="form-control" required>
            </div>

            <div class="col-md-4 mb-3">
                <label>Tanggal Keberangkatan</label>
                <input type="date" name="departure_date" class="form-control" required>
            </div>

            <div class="col-md-4 mb-3">
                <label>Durasi (Hari)</label>
                <input type="number" name="duration_days" class="form-control" required>
            </div>

            <div class="col-md-4 mb-3">
                <label>Kota Keberangkatan</label>
                <input type="text" name="departure_city" class="form-control" required>
            </div>

            <div class="col-md-4 mb-3">
                <label>Tipe Kamar</label>
                <select name="room_type" class="form-control" required>
                    <option value="quad">QUAD</option>
                    <option value="triple">TRIPLE</option>
                    <option value="double">DOUBLE</option>
                </select>
            </div>

            <div class="col-12 mb-3">
                <label>Deskripsi</label>
                <textarea name="description" rows="4" class="form-control"></textarea>
            </div>

            <div class="col-12 mb-3">
                <label>Foto</label>
                <input type="file" name="photos[]" multiple class="form-control">
            </div>

        </div>

        <button class="btn btn-primary">Simpan Package</button>

    </form>
</div>
@endsection