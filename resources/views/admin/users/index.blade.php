@extends('layouts.admin')

@section('title', 'Users')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h1 class="fs-3 mb-1">Users</h1>
        <p class="mb-0 text-muted">Manage registered users and their roles</p>
      </div>
    </div>
  </div>
</div>

@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  </div>
@endif

<div class="card border-0 shadow-sm">
  <div class="card-body p-0">
    <table class="table table-hover align-middle mb-0">
      <thead class="table-light">
        <tr>
          <th class="ps-4">#</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th>Registered</th>
          <th class="text-end pe-4">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($users as $user)
        <tr>
          <td class="ps-4 text-muted">{{ $user->id }}</td>
          <td>
            <div class="d-flex align-items-center gap-2">
              <div class="avatar avatar-sm rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold" style="width:36px; height:36px; font-size:0.85rem;">
                {{ strtoupper(substr($user->name, 0, 1)) }}
              </div>
              <span class="fw-semibold">{{ $user->name }}</span>
            </div>
          </td>
          <td class="text-muted">{{ $user->email }}</td>
          <td>
            @if($user->role === 'admin')
              <span class="badge bg-danger-subtle text-danger rounded-pill px-3 py-2">Admin</span>
            @else
              <span class="badge bg-success-subtle text-success rounded-pill px-3 py-2">Customer</span>
            @endif
          </td>
          <td class="text-muted small">{{ $user->created_at->format('d M Y') }}</td>
          <td class="text-end pe-4">
            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
              Edit Role
            </a>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="6" class="text-center py-5 text-muted">No users found.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
