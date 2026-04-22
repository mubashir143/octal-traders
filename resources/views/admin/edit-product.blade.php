@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
            <div>
                <h1 class="fs-3 mb-1">Edit Product</h1>
                <p class="mb-0">Update the details for <strong>{{ $product->name }}</strong></p>
            </div>
            <div>
                <a href="{{ route('admin.inventory') }}" class="btn btn-primary">Go to Inventory List</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card">
            <div class="card-body p-4">
                <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" placeholder="Enter product name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="code" class="form-label">Product Code (SKU)</label>
                            <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $product->code) }}" placeholder="Enter SKU" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="price" class="form-label">Selling Price</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $product->price) }}" placeholder="0.00" step="0.01" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="compare_at_price" class="form-label">Original Price (Cut-off)</label>
                            <input type="number" class="form-control" id="compare_at_price" name="compare_at_price" value="{{ old('compare_at_price', $product->compare_at_price) }}" placeholder="0.00" step="0.01">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="quantity" class="form-label">Stock Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}" placeholder="0" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" id="category" name="category">
                                <option value="">Select category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->name }}" {{ old('category', $product->category) == $category->name ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="brand" class="form-label">Brand</label>
                            <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand', $product->brand) }}" placeholder="Enter brand name">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="image" class="form-label">Main Image (Card View)</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            @if($product->image)
                                <div class="mt-2 text-muted small">Current: {{ basename($product->image) }}</div>
                            @endif
                        </div>
                        <div class="col-md-6 mb-3 d-flex align-items-center">
                             @if($product->image)
                                <img src="{{ asset($product->image) }}" class="avatar avatar-xxl rounded shadow-sm border" style="width: 80px; height: 80px; object-fit: cover;">
                             @endif
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Product Gallery</label>
                        <div class="row g-3 mb-3">
                            @foreach($product->images as $img)
                                <div class="col-auto position-relative">
                                    <img src="{{ asset($img->image_path) }}" class="rounded border" style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="d-flex flex-column gap-1 position-absolute top-0 end-0 mt-n2 me-n1">
                                        <form action="{{ route('admin.products.delete-image', $img->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-xs rounded-circle p-1 shadow-sm" onclick="return confirm('Delete this image?')">
                                                <i class="ti ti-x fs-6"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.products.set-main-image', $img->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-xs rounded-circle p-1 shadow-sm" title="Set as Main">
                                                <i class="ti ti-check fs-6"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <label for="gallery" class="form-label small text-muted">Add more gallery images</label>
                        <div class="border border-dashed rounded-3 p-3 text-center bg-light">
                            <i class="ti ti-upload fs-2 text-muted d-block mb-1"></i>
                            <input type="file" class="form-control form-control-sm" id="gallery" name="gallery[]" accept="image/*" multiple>
                            <div class="form-text small mt-1">Select multiple images to add to the gallery.</div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="6" placeholder="Enter product description">{{ old('description', $product->description) }}</textarea>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary px-4">Update Product</button>
                        <a href="{{ route('admin.inventory') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#description'), {
            toolbar: ['heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote', 'undo', 'redo'],
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
                ]
            }
        })
        .catch(error => {
            console.error(error);
        });
</script>
<style>
    .ck-editor__editable {
        min-height: 400px;
    }
</style>
@endpush
@endsection
