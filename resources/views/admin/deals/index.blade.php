@extends('layouts.admin')

@section('title', 'Manage Deals')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="mb-6 d-flex justify-content-between align-items-center">
            <div>
                <h1 class="fs-3 mb-1">Bundle Deals</h1>
                <p>Create and manage multi-product bundles.</p>
            </div>
            <a href="{{ route('admin.deals.create') }}" class="btn btn-primary">Create New Deal</a>
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
                                <th>Name</th>
                                <th>Products</th>
                                <th>Deal Price</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($deals as $deal)
                            <tr>
                                <td>{{ $deal->name }}</td>
                                <td>
                                    <ul class="list-unstyled mb-0 small">
                                        @foreach($deal->products as $product)
                                            <li>• {{ $product->name }}</li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td>${{ number_format($deal->deal_price, 2) }}</td>
                                <td>
                                    @if($deal->status)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.deals.edit', $deal->id) }}" class="btn btn-sm btn-info text-white">Edit</a>
                                        <form action="{{ route('admin.deals.destroy', $deal->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">No bundle deals found.</td>
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
