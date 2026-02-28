@extends('layouts.app')

@section('title','Manajemen User')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="font-weight-bold text-dark mb-0">
        Manajemen User
    </h4>

    <a href="{{ route('users.create') }}" class="btn btn-gold shadow-sm">
        <i class="fas fa-user-plus mr-1"></i> Tambah User
    </a>
</div>

@if(session('success'))
<div class="alert corporate-alert alert-dismissible fade show">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert">&times;</button>
</div>
@endif

<div class="card shadow-sm border-0">
    <div class="card-body">

        {{-- SEARCH --}}
        <div class="mb-4">
            <input type="text"
                   id="searchInput"
                   class="form-control corporate-input"
                   placeholder="Cari nama, username atau email...">
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle corporate-table">
                <thead>
                    <tr>
                        <th width="60">ID</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th width="160">Role</th>
                        <th width="120">Status</th>
                        <th width="130" class="text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody id="userTable">
                @forelse($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>

                    

                        {{-- NAMA --}}
                        <td>
                            <strong>
                                {{ optional(optional($user->userable)->people)->fullname ?? '-' }}
                            </strong>
                        </td>

                        <td>{{ $user->username }}</td>

                        <td>{{ $user->email }}</td>

                        {{-- ROLE --}}
                        <td>
                            @forelse($user->roles as $role)
                                <span class="badge-role">
                                    {{ ucfirst($role->name) }}
                                </span>
                            @empty
                                <span class="text-muted">No Role</span>
                            @endforelse
                        </td>

                        {{-- STATUS --}}
                        <td>
                            @if($user->is_active ?? true)
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-secondary">Non Active</span>
                            @endif
                        </td>

                        {{-- ACTION --}}
                        <td class="text-center">

                            <a href="{{ route('users.edit', $user) }}"
                               class="btn btn-sm btn-outline-corporate mr-1"
                               title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>

                            <button type="button"
                                    class="btn btn-sm btn-outline-danger"
                                    data-toggle="modal"
                                    data-target="#deleteModal"
                                    data-id="{{ $user->id }}"
                                    data-name="{{ $user->username }}"
                                    title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-secondary py-4">
                            Belum ada data user
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $users->links() }}
        </div>

    </div>
</div>


<!-- ================= DELETE MODAL ================= -->

<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content corporate-modal shadow">

            <div class="modal-header border-0 pb-2">
                <h5 class="modal-title font-weight-bold">
                    Konfirmasi Penghapusan
                </h5>
                <button type="button"
                        class="close"
                        data-dismiss="modal">
                    &times;
                </button>
            </div>

            <div class="modal-body pt-2 text-center">

                <div class="delete-icon mb-3">
                    <i class="fas fa-exclamation-circle"></i>
                </div>

                <p class="text-secondary mb-1">
                    Anda akan menghapus user:
                </p>

                <h6 class="font-weight-bold text-dark"
                    id="deleteUserName"></h6>

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


{{-- ================= SCRIPT ================= --}}

<script>
document.getElementById('searchInput')?.addEventListener('keyup', function() {
    let filter = this.value.toLowerCase();
    let rows = document.querySelectorAll('#userTable tr');

    rows.forEach(row => {
        let text = row.textContent.toLowerCase();
        row.style.display = text.includes(filter) ? '' : 'none';
    });
});

$('#deleteModal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget);
    let userId = button.data('id');
    let username = button.data('name');

    let modal = $(this);
    modal.find('#deleteUserName').text(username);

    let action = "{{ url('users') }}/" + userId;
    modal.find('#deleteForm').attr('action', action);
});
</script>

@endsection