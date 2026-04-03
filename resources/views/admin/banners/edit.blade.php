@extends('layouts.admin')

@section('title', 'Edit Banner')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="mb-4">
            <h1 class="fs-4 mb-1">Edit Banner</h1>
            <p>Update banner information for your home page.</p>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold">Current Banner Image</label>
                        <div class="mb-2">
                            <img src="{{ asset($banner->image) }}" alt="Current Banner" class="img-thumbnail rounded shadow-sm" style="max-width: 400px; max-height: 200px; object-fit: cover;">
                        </div>
                        <label for="image" class="form-label mt-2">Replace Image (Recommended: 1920x600 px)</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror shadow-none" id="image" name="image">
                        <div class="form-text">Leave blank if you don't want to change the image.</div>
                        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold">Title (Main Text)</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror shadow-none" id="title" name="title" value="{{ old('title', $banner->title) }}" placeholder="Enter banner title">
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="subtitle" class="form-label fw-bold">Subtitle (Sub-text)</label>
                        <input type="text" class="form-control @error('subtitle') is-invalid @enderror shadow-none" id="subtitle" name="subtitle" value="{{ old('subtitle', $banner->subtitle) }}" placeholder="Enter banner subtitle">
                        @error('subtitle')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="button_text" class="form-label fw-bold">Button Text</label>
                            <input type="text" class="form-control @error('button_text') is-invalid @enderror shadow-none" id="button_text" name="button_text" value="{{ old('button_text', $banner->button_text) }}" placeholder="e.g. Shop Now">
                            @error('button_text')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label for="button_link" class="form-label fw-bold">Button Link</label>
                            <input type="text" class="form-control @error('button_link') is-invalid @enderror shadow-none" id="button_link" name="button_link" value="{{ old('button_link', $banner->button_link) }}" placeholder="URL (e.g. /shop)">
                            @error('button_link')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="order" class="form-label fw-bold">Display Order</label>
                            <input type="number" class="form-control @error('order') is-invalid @enderror shadow-none" id="order" name="order" value="{{ old('order', $banner->order) }}">
                            @error('order')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-md-6">
                            <label for="status" class="form-label fw-bold">Status</label>
                            <select class="form-select @error('status') is-invalid @enderror shadow-none" id="status" name="status">
                                <option value="1" {{ old('status', $banner->status) == '1' ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ old('status', $banner->status) == '0' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="mt-5 pt-3 d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4 fw-bold shadow-sm">Update Banner</button>
                        <a href="{{ route('admin.banners.index') }}" class="btn btn-light px-4 border">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
