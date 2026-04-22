@extends('layouts.admin')

@section('title', 'Create Deal')

@section('content')
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="mb-6">
            <a href="{{ route('admin.deals.index') }}" class="text-decoration-none text-muted small"><i class="ti ti-arrow-left me-1"></i> Back to Deals</a>
            <h1 class="fs-3 mt-2">Create New Bundle Deal</h1>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <form action="{{ route('admin.deals.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label fw-bold">Deal Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="e.g. Summer Gaming Bundle" value="{{ old('name') }}" required>
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="3" placeholder="What's included in this deal?">{{ old('description') }}</textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Deal Price (Total)</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" name="deal_price" class="form-control @error('deal_price') is-invalid @enderror" value="{{ old('deal_price') }}" required>
                        </div>
                        @error('deal_price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Select Products (Hold Ctrl to select multiple)</label>
                        <select name="products[]" class="form-select @error('products') is-invalid @enderror" multiple style="height: 200px;" required>
                            @foreach($products as $product)
                                <option value="{{ $product->id }}" {{ (is_array(old('products')) && in_array($product->id, old('products'))) ? 'selected' : '' }}>
                                    {{ $product->name }} - (${{ number_format($product->price, 2) }})
                                </option>
                            @endforeach
                        </select>
                        <div class="form-text">Select at least 2 products for a bundle deal.</div>
                        @error('products') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-5">
                        <a href="{{ route('admin.deals.index') }}" class="btn btn-light px-4">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4">Save Deal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
