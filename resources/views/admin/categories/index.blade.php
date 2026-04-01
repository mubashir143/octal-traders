@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="fs-3 mb-1">Categories</h1>
            <p class="mb-0">Manage your product categories</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary"><i class="ti ti-plus me-2"></i> Add New Category</a>
    </div>
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card border-0 shadow-sm table-responsive">
    <table class="table mb-0 text-nowrap table-hover align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Slug</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr>
                <td>#{{ $category->id }}</td>
                <td class="fw-bold">{{ $category->name }}</td>
                <td class="text-muted">{{ $category->slug }}</td>
                <td class="text-end">
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-sm btn-outline-secondary me-1"><i class="ti ti-pencil"></i></a>
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure you want to delete this category?');"><i class="ti ti-trash"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center py-4">No categories found. Click 'Add New Category' to start.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $categories->links() }}
</div>
@endsection
