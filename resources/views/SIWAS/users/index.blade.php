@extends('layouts.siwas')

@section('title', 'Users Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 mb-0 text-gray-800">Users Management</h1>
    <a href="{{ route('siwas.users.create') }}" class="btn btn-primary">
        <i class="fas fa-plus me-2"></i>Add New User
    </a>
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>john@example.com</td>
                        <td>Admin</td>
                        <td><span class="badge bg-success">Active</span></td>
                        <td>
                            <a href="{{ route('siwas.users.edit', 1) }}" class="btn btn-sm btn-accent me-2">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 