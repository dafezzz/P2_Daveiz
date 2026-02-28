@extends('layouts.app')
@section('title','Detail Package')

@section('content')
<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="font-weight-bold mb-1">
                {{ $package->name }}
            </h4>
            <span class="badge badge-primary">
                {{ strtoupper($package->type) }}
            </span>
        </div>

        <div>
            <a href="{{ route('packages.edit',$package) }}"
               class="btn btn-warning mr-2">
                <i class="fas fa-edit"></i> Edit
            </a>

            <a href="{{ route('packages.index') }}"
               class="btn btn-secondary">
                Kembali
            </a>
        </div>
    </div>


    {{-- INFO UTAMA --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <div class="row">

                <div class="col-md-3">
                    <small class="text-muted">Harga</small>
                    <h6 class="font-weight-bold">
                        Rp {{ number_format($package->price,0,',','.') }}
                    </h6>
                </div>

                <div class="col-md-3">
                    <small class="text-muted">Quota</small>
                    <h6 class="font-weight-bold">
                        {{ $package->quota_used }} / {{ $package->quota }}
                    </h6>
                </div>

                <div class="col-md-3">
                    <small class="text-muted">Tanggal Berangkat</small>
                    <h6 class="font-weight-bold">
                        {{ \Carbon\Carbon::parse($package->departure_date)->format('d M Y') }}
                    </h6>
                </div>

                <div class="col-md-3">
                    <small class="text-muted">Durasi</small>
                    <h6 class="font-weight-bold">
                        {{ $package->duration_days }} Hari
                    </h6>
                </div>

                <div class="col-md-3 mt-3">
                    <small class="text-muted">Kota Keberangkatan</small>
                    <h6 class="font-weight-bold">
                        {{ $package->departure_city }}
                    </h6>
                </div>

                <div class="col-md-3 mt-3">
                    <small class="text-muted">Tipe Kamar</small>
                    <h6 class="font-weight-bold">
                        {{ strtoupper($package->room_type) }}
                    </h6>
                </div>

                <div class="col-md-3 mt-3">
                    <small class="text-muted">Status</small>
                    <h6>
                        @if($package->status == 'open')
                            <span class="badge badge-success">OPEN</span>
                        @elseif($package->status == 'closed')
                            <span class="badge badge-danger">CLOSED</span>
                        @else
                            <span class="badge badge-secondary">
                                {{ strtoupper($package->status) }}
                            </span>
                        @endif
                    </h6>
                </div>

            </div>
        </div>
    </div>


    {{-- DESKRIPSI --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <h6 class="font-weight-bold mb-3">Deskripsi</h6>

            @if($package->detail?->description)
                <p class="text-muted">
                    {!! nl2br(e($package->detail->description)) !!}
                </p>
            @else
                <p class="text-muted">Belum ada deskripsi.</p>
            @endif
        </div>
    </div>


    {{-- INCLUDE & EXCLUDE --}}
    <div class="row mb-4">

        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h6 class="font-weight-bold mb-3">Include</h6>

                    @if($package->detail?->includes)
                        <p class="text-muted">
                            {!! nl2br(e($package->detail->includes)) !!}
                        </p>
                    @else
                        <p class="text-muted">Belum diisi.</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body">
                    <h6 class="font-weight-bold mb-3">Exclude</h6>

                    @if($package->detail?->excludes)
                        <p class="text-muted">
                            {!! nl2br(e($package->detail->excludes)) !!}
                        </p>
                    @else
                        <p class="text-muted">Belum diisi.</p>
                    @endif
                </div>
            </div>
        </div>

    </div>


    {{-- ITINERARY --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <h6 class="font-weight-bold mb-3">Itinerary</h6>

            @if($package->itineraries->count())
                @foreach($package->itineraries as $item)
                    <div class="mb-3 p-3 border rounded">
                        <strong>Hari {{ $item->day }}</strong>
                        <div class="font-weight-bold">
                            {{ $item->title }}
                        </div>
                        <p class="text-muted mb-0">
                            {{ $item->description }}
                        </p>
                    </div>
                @endforeach
            @else
                <p class="text-muted">Belum ada itinerary.</p>
            @endif
        </div>
    </div>


    {{-- GALLERY FOTO --}}
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h6 class="font-weight-bold mb-3">Gallery Foto</h6>

            <div class="row">
                @if($package->photos->count())
                    @foreach($package->photos as $photo)
                        <div class="col-md-3 mb-3">
                            <img src="{{ asset('storage/' . $photo->photo_path) }}"
                                 class="img-fluid rounded shadow-sm"
                                 style="height:200px; object-fit:cover; width:100%;">
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <p class="text-muted">Belum ada foto.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>
@endsection