@extends('layouts.siwas')

@section('title', 'Users Management')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Users Management</h1>   
        @if(auth()->user()->isSuperAdmin())
            <a href="{{ route('siwas.users.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add New User
            </a>
        @endif
    </div>

    <div class="card shadow">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            @if(auth()->user()->isSuperAdmin())
                            <th>Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengguna as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                {{-- <td>{{ ucfirst($user->role) }}</td> --}}
                                <td>
                                    <span class="badge bg-{{ $user->role == 'super-admin' ? 'primary' : 'secondary' }}">
                                        {{ $user->role == 'super-admin' ? 'Super Admin' : 'Admin' }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $user->status ? 'success' : 'secondary' }}">
                                        {{ $user->status ? 'Active' : 'Disabled' }}
                                    </span>
                                </td>
                                @if(auth()->user()->isSuperAdmin())
                                <td>
                                    <a href="{{ route('siwas.users.edit', $user->id) }}"
                                        class="btn btn-sm btn-warning me-2">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"
                                        data-user-id="{{ route('siwas.users.destroy', $user->id) }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $pengguna->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus user ini? User tidak dapat dipulihkan.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var deleteModal = document.getElementById('deleteModal');
            var deleteForm = document.getElementById('deleteForm');

            deleteModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var userDeleteUrl = button.getAttribute('data-user-id');
                deleteForm.setAttribute('action', userDeleteUrl);
            });
        });
    </script>
@endsection
