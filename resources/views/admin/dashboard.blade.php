@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="font-weight-bold text-dark mb-0">
        Admin Dashboard
    </h4>
</div>

<div class="row">

    <!-- Users -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="{{ route('users.index') }}"
           class="text-decoration-none dashboard-link">
            <div class="card dashboard-card h-100">
                <div class="card-body">
                    <div class="dashboard-label">
                        Kelola Users
                    </div>

                    <div class="dashboard-value">
                        12
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Packages -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="#"
           class="text-decoration-none dashboard-link">
            <div class="card dashboard-card h-100">
                <div class="card-body">
                    <div class="dashboard-label">
                        Kelola Packages
                    </div>

                    <div class="dashboard-value">
                        8
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Jamaah -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="#"
           class="text-decoration-none dashboard-link">
            <div class="card dashboard-card h-100">
                <div class="card-body">
                    <div class="dashboard-label">
                        Kelola Jamaah
                    </div>

                    <div class="dashboard-value">
                        20
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- Company -->
    <div class="col-xl-3 col-md-6 mb-4">
        <a href="#"
           class="text-decoration-none dashboard-link">
            <div class="card dashboard-card h-100">
                <div class="card-body">
                    <div class="dashboard-label">
                        Company Settings
                    </div>

                    <div class="dashboard-value text-muted">
                        —
                    </div>
                </div>
            </div>
        </a>
    </div>

</div>


<!-- Reports Section -->
<div class="row">
    <div class="col-12">
        <div class="card dashboard-report-card">
            <div class="card-body">
                <div class="dashboard-label mb-2">
                    Laporan & Statistik
                </div>

                <p class="text-secondary mb-0">
                    Monitoring performa penjualan, jumlah jamaah,
                    dan statistik keberangkatan.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection