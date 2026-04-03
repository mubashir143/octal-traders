@extends('layouts.admin')

@section('title', 'Manage Banners')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="mb-6 d-flex justify-content-between align-items-center">
            <div>
                <h1 class="fs-3 mb-1">Banners</h1>
                <p>Manage home page banners.</p>
            </div>
            <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">Add New Banner</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Order</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($banners as $banner)
                            <tr>
                                <td>
                                    <img src="{{ asset($banner->image) }}" alt="" style="width: 100px; height: 50px; object-fit: cover;">
                                </td>
                                <td>{{ $banner->title ?? 'N/A' }}</td>
                                <td>{{ $banner->order }}</td>
                                <td>
                                    @if($banner->status)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">No banners found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
