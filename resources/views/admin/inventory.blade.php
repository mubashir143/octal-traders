@extends('layouts.admin')

@section('title', 'Inventory')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="fs-3 mb-1">Inventory</h1>
                <p class="mb-0">Manage your product inventory</p>
            </div>
            <div>
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Add Product</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="d-flex gap-2 mb-3 flex-wrap justify-content-between">
            <input type="text" class="form-control" placeholder="Search products..." style="max-width: 250px;">
            <div class="d-flex gap-2">
                <button class="btn btn-outline-secondary"><i class="ti ti-filter"></i> Filter</button>
                <button class="btn btn-outline-secondary"><i class="ti ti-file-excel"></i> Excel</button>
                <button class="btn btn-outline-secondary"><i class="ti ti-file-pdf"></i> PDF</button>
            </div>
        </div>
        <div class="card table-responsive">
            <table class="table mb-0 text-nowrap table-hover">
                <thead class="table-light border-light">
                    <tr>
                        <th>Image</th>
                        <th>Code</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Unit</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
@foreach($products as $product)
                    <tr class="align-middle">
                        <td>
                            <a href="">
                                <img src="{{ $product->image ? asset($product->image) : asset('admin-assets/images/product-1.png') }}" alt="{{ $product->name }}" class="avatar avatar-md rounded" />
                                <span class="ms-3">{{ $product->name }}</span>
                            </a>
                        </td>
                        <td>{{ $product->code }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->unit }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                            <a href="#"><i class="ti ti-edit"></i></a>
                            <form action="#" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link link-danger p-0 ms-2"><i class="ti ti-trash"></i></button>
                            </form>
                        </td>
                    </tr>
@endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
