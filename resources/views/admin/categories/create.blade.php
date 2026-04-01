@extends('layouts.admin')

@section('title', 'Add Category')

@section('content')
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h1 class="fs-3 mb-1">Add New Category</h1>
            <p class="mb-0">Create a new category for products</p>
        </div>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary"><i class="ti ti-arrow-left me-1"></i> Back</a>
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm p-4">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label form-label-lg">Category Name</label>
                    <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="e.g. Headphones">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-4 pt-2">
                    <button type="submit" class="btn btn-primary w-100 py-2">Save Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
