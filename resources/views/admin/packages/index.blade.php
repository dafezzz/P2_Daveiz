@extends('layouts.app')

@section('title','Manajemen Package')

@section('content')
<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="font-weight-bold text-dark mb-0">
                Manajemen Packages
            </h4>
            <small class="text-muted">
                Total: {{ $packages->total() }} Packages
            </small>
        </div>

        <a href="{{ route('packages.create') }}" class="btn btn-gold shadow-sm">
            <i class="fas fa-plus mr-1"></i> Tambah Package
        </a>
    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="alert corporate-alert alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif


    {{-- CARD --}}
    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle corporate-table mb-0">
                <thead>
                    <tr>
                        <th width="80">Foto</th>
                        <th>Package</th>
                        <th>Harga</th>
                        <th>Quota</th>
                        <th>Status</th>
                        <th width="150" class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($packages as $pkg)
                    <tr>

                        {{-- FOTO --}}
                 <td>
    @if($pkg->photos->first())
        <img src="{{ asset('storage/' . $pkg->photos->first()->photo_path) }}"
             class="package-img">
    @else
        <div class="package-placeholder">
            <i class="fas fa-box"></i>
        </div>
    @endif
</td>

                        {{-- NAMA --}}
                        <td>
                            <strong>{{ $pkg->name }}</strong>

                            <div class="mt-1">
                                <span class="badge-role">
                                    {{ strtoupper($pkg->type) }}
                                </span>
                            </div>

                            <small class="text-muted d-block mt-1">
                                Berangkat:
                                {{ \Carbon\Carbon::parse($pkg->departure_date)->format('d M Y') }}
                            </small>
                        </td>

                        {{-- HARGA --}}
                        <td>
                            <strong>
                                Rp {{ number_format($pkg->price,0,',','.') }}
                            </strong>
                        </td>

                        {{-- QUOTA --}}
                        <td style="min-width:160px;">
                            @php
                                $percent = $pkg->quota > 0
                                    ? ($pkg->quota_used / $pkg->quota) * 100
                                    : 0;
                            @endphp

                            <small>
                                {{ $pkg->quota_used }} / {{ $pkg->quota }}
                            </small>

                            <div class="progress corporate-progress mt-1">
                                <div class="progress-bar"
                                     style="width: {{ $percent }}%">
                                </div>
                            </div>

                            <small class="text-muted">
                                {{ $pkg->jamaahs_count }} Jamaah
                            </small>
                        </td>

                        {{-- STATUS --}}
                        <td>
                            @if($pkg->status == 'open')
                                <span class="badge badge-success">OPEN</span>
                            @elseif($pkg->status == 'closed')
                                <span class="badge badge-danger">CLOSED</span>
                            @else
                                <span class="badge badge-secondary">
                                    {{ strtoupper($pkg->status) }}
                                </span>
                            @endif
                        </td>

                        {{-- ACTION --}}
                        <td class="text-center">
                            <a href="{{ route('packages.show',$pkg) }}"
                               class="btn btn-sm btn-outline-corporate mr-1"
                               title="Detail">
                                <i class="fas fa-eye"></i>
                            </a>

                            <a href="{{ route('packages.edit',$pkg) }}"
                               class="btn btn-sm btn-outline-corporate mr-1"
                               title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>

                            <button type="button"
                                    class="btn btn-sm btn-outline-danger"
                                    data-toggle="modal"
                                    data-target="#deleteModal"
                                    data-id="{{ $pkg->id }}"
                                    data-name="{{ $pkg->name }}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="6"
                            class="text-center text-muted py-4">
                            Belum ada package.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        {{ $packages->links() }}
    </div>

</div>


{{-- DELETE MODAL --}}
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content corporate-modal shadow">

            <div class="modal-header border-0 pb-2">
                <h5 class="modal-title font-weight-bold">
                    Konfirmasi Penghapusan
                </h5>
                <button type="button" class="close"
                        data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body text-center">
                <div class="delete-icon mb-3">
                    <i class="fas fa-exclamation-circle"></i>
                </div>

                <p class="text-secondary mb-1">
                    Anda akan menghapus package:
                </p>

                <h6 class="font-weight-bold text-dark"
                    id="deletePackageName"></h6>

                <small class="text-muted">
                    Tindakan ini tidak dapat dibatalkan.
                </small>
            </div>

            <div class="modal-footer border-0 justify-content-center">
                <button type="button"
                        class="btn btn-light"
                        data-dismiss="modal">
                    Batal
                </button>

                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="btn btn-gold">
                        Ya, Hapus
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>


<script>
$('#deleteModal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget);
    let id = button.data('id');
    let name = button.data('name');

    let modal = $(this);
    modal.find('#deletePackageName').text(name);

    let action = "{{ url('packages') }}/" + id;
    modal.find('#deleteForm').attr('action', action);
});
</script>

@endsection