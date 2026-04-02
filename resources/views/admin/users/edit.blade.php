@extends('layouts.admin')

@section('title', 'Edit User Role')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h1 class="fs-3 mb-1">Edit User Role</h1>
        <p class="mb-0 text-muted">Change the role for <strong>{{ $user->name }}</strong></p>
      </div>
      <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
        ← Back to Users
      </a>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 col-lg-5">
    <div class="card border-0 shadow-sm">
      <div class="card-body p-4">

        {{-- User Info --}}
        <div class="d-flex align-items-center gap-3 mb-4 p-3 bg-light rounded-3">
          <div class="avatar rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold" style="width:50px; height:50px; font-size:1.2rem;">
            {{ strtoupper(substr($user->name, 0, 1)) }}
          </div>
          <div>
            <h5 class="mb-0">{{ $user->name }}</h5>
            <p class="mb-0 text-muted small">{{ $user->email }}</p>
          </div>
        </div>

        @if($errors->any())
          <div class="alert alert-danger rounded-3">
            {{ $errors->first() }}
          </div>
        @endif

        <form method="POST" action="{{ route('admin.users.update', $user) }}">
          @csrf
          @method('PUT')

          <div class="mb-4">
            <label class="form-label fw-semibold">User Role</label>
            <div class="d-flex gap-3">
              <label class="flex-fill">
                <input type="radio" name="role" value="customer" class="btn-check" id="role_customer" {{ $user->role === 'customer' ? 'checked' : '' }}>
                <span class="btn btn-outline-success w-100 rounded-3 py-3" for="role_customer" style="cursor:pointer;">
                  <i class="ti ti-user fs-4 d-block mb-1"></i>
                  Customer
                </span>
              </label>
              <label class="flex-fill">
                <input type="radio" name="role" value="admin" class="btn-check" id="role_admin" {{ $user->role === 'admin' ? 'checked' : '' }}>
                <span class="btn btn-outline-danger w-100 rounded-3 py-3" for="role_admin" style="cursor:pointer;">
                  <i class="ti ti-shield fs-4 d-block mb-1"></i>
                  Admin
                </span>
              </label>
            </div>
            <small class="text-muted mt-2 d-block">
              <strong>Admin</strong> users can access the dashboard. <strong>Customer</strong> users can only browse the shop.
            </small>
          </div>

          <button type="submit" class="btn btn-primary w-100 rounded-pill py-2 fw-semibold">
            Save Changes
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
