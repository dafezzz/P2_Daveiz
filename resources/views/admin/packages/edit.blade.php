@extends('layouts.app')
@section('title','Edit Package')

@section('content')
<div class="container-fluid">

    <h4 class="mb-4 font-weight-bold">Edit Package</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('packages.update',$package) }}" 
          method="POST" 
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">

            {{-- NAMA --}}
            <div class="col-md-6 mb-3">
                <label>Nama Package</label>
                <input type="text" 
                       name="name" 
                       value="{{ old('name',$package->name) }}" 
                       class="form-control" 
                       required>
            </div>

            {{-- TYPE --}}
            <div class="col-md-3 mb-3">
                <label>Type</label>
                <select name="type" class="form-control" required>
                    <option value="umrah" 
                        {{ old('type',$package->type)=='umrah'?'selected':'' }}>
                        UMRAH
                    </option>
                    <option value="haji"
                        {{ old('type',$package->type)=='haji'?'selected':'' }}>
                        HAJI
                    </option>
                </select>
            </div>

            {{-- STATUS --}}
            <div class="col-md-3 mb-3">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="draft"
                        {{ old('status',$package->status)=='draft'?'selected':'' }}>
                        DRAFT
                    </option>
                    <option value="published"
                        {{ old('status',$package->status)=='published'?'selected':'' }}>
                        PUBLISHED
                    </option>
                    <option value="closed"
                        {{ old('status',$package->status)=='closed'?'selected':'' }}>
                        CLOSED
                    </option>
                </select>
            </div>

            {{-- HARGA --}}
            <div class="col-md-4 mb-3">
                <label>Harga</label>
                <input type="number" 
                       name="price" 
                       value="{{ old('price',$package->price) }}" 
                       class="form-control" 
                       required>
            </div>

            {{-- QUOTA --}}
            <div class="col-md-4 mb-3">
                <label>Quota</label>
                <input type="number" 
                       name="quota" 
                       value="{{ old('quota',$package->quota) }}" 
                       class="form-control" 
                       required>
            </div>

            {{-- TANGGAL --}}
            <div class="col-md-4 mb-3">
                <label>Tanggal Keberangkatan</label>
                <input type="date" 
                       name="departure_date" 
                       value="{{ old('departure_date',$package->departure_date) }}" 
                       class="form-control" 
                       required>
            </div>

            {{-- DURASI --}}
            <div class="col-md-4 mb-3">
                <label>Durasi (Hari)</label>
                <input type="number" 
                       name="duration_days" 
                       value="{{ old('duration_days',$package->duration_days) }}" 
                       class="form-control" 
                       required>
            </div>

            {{-- KOTA --}}
            <div class="col-md-4 mb-3">
                <label>Kota Keberangkatan</label>
                <input type="text" 
                       name="departure_city" 
                       value="{{ old('departure_city',$package->departure_city) }}" 
                       class="form-control" 
                       required>
            </div>

            {{-- ROOM TYPE --}}
            <div class="col-md-4 mb-3">
                <label>Tipe Kamar</label>
                <select name="room_type" class="form-control" required>
                    <option value="quad"
                        {{ old('room_type',$package->room_type)=='quad'?'selected':'' }}>
                        QUAD
                    </option>
                    <option value="triple"
                        {{ old('room_type',$package->room_type)=='triple'?'selected':'' }}>
                        TRIPLE
                    </option>
                    <option value="double"
                        {{ old('room_type',$package->room_type)=='double'?'selected':'' }}>
                        DOUBLE
                    </option>
                </select>
            </div>

            {{-- DESKRIPSI --}}
            <div class="col-12 mb-3">
                <label>Deskripsi</label>
                <textarea name="description" 
                          rows="4" 
                          class="form-control">{{ old('description',$package->description) }}</textarea>
            </div>

            {{-- FOTO LAMA --}}
            <div class="col-12 mb-3">
                <label>Foto Saat Ini</label>
                <div class="d-flex flex-wrap">
                    @foreach($package->photos as $photo)
                        <div class="mr-3 mb-3 text-center">
                            <img src="{{ asset('storage/'.$photo->photo_path) }}"
                                 width="120"
                                 class="rounded mb-1">
                            <div>
                                <input type="checkbox" 
                                       name="delete_photos[]" 
                                       value="{{ $photo->id }}">
                                <small class="text-danger">Hapus</small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- FOTO BARU --}}
            <div class="col-12 mb-3">
                <label>Tambah Foto</label>
                <input type="file" 
                       name="photos[]" 
                       multiple 
                       class="form-control">
            </div>

        </div>

        <button class="btn btn-primary">Update Package</button>

    </form>
</div>
@endsection