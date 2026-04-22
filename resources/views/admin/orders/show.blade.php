@extends('layouts.admin')

@section('title', 'Order Details')

@push('styles')
<style>
    .icon-shape {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .border-start-2 {
        border-left-width: 2px !important;
    }
</style>
@endpush

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="fs-3 mb-1">Order Details #{{ $order->id }}</h1>
                <p class="mb-0">Created on {{ $order->created_at->format('M d, Y h:i A') }}</p>
            </div>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">Back to Orders</a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <h5 class="text-uppercase mb-4">Order Items</h5>
                <div class="table-responsive">
                    <table class="table border-0 align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th class="text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $item)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-start">
                                        @if($item->deal_id)
                                            <div class="icon-shape icon-md bg-primary-subtle text-primary rounded-2 me-3 flex-shrink-0">
                                                <i class="ti ti-gift fs-4"></i>
                                            </div>
                                            <div>
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="fw-bold text-dark">{{ $item->deal->name }}</span>
                                                    <span class="badge bg-primary-subtle text-primary rounded-pill small" style="font-size: 0.65rem;">BUNDLE</span>
                                                </div>
                                                <div class="mt-2 ps-3 border-start border-start-2 border-primary border-opacity-25">
                                                    @foreach($item->deal->products as $p)
                                                        <div class="small text-muted mb-1 d-flex align-items-center">
                                                            <i class="ti ti-point me-1"></i>
                                                            <span>{{ $p->name }}</span>
                                                            <span class="ms-auto ps-3 text-secondary" style="font-size: 0.75rem;">Rs. {{ number_format($p->price, 2) }}</span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            <img src="{{ $item->product->image ? asset($item->product->image) : asset('admin-assets/images/product-1.png') }}" alt="" class="avatar avatar-md rounded me-3 flex-shrink-0" />
                                            <span class="fw-semibold text-dark">{{ $item->product->name }}</span>
                                        @endif
                                    </div>
                                </td>
                                <td>Rs. {{ number_format($item->unit_price, 2) }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td class="text-end">Rs. {{ number_format($item->total_price, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="border-top fw-bold">
                            <tr>
                                <td colspan="3" class="text-end py-3">Grand Total</td>
                                <td class="text-end py-3">Rs. {{ number_format($order->total_amount, 2) }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h5 class="text-uppercase mb-4">Customer & Shipping Details</h5>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <h6 class="text-muted small text-uppercase fw-bold">Name</h6>
                        <p class="mb-0 fw-bold">{{ $order->customer_name }}</p>
                    </div>
                    <div class="col-md-6 mb-3">
                        <h6 class="text-muted small text-uppercase fw-bold">Email</h6>
                        <p class="mb-0 fw-bold">{{ $order->customer_email }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="text-muted small text-uppercase fw-bold">Phone</h6>
                        <p class="mb-0 fw-bold">{{ $order->customer_phone }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="text-muted small text-uppercase fw-bold">Shipping Address</h6>
                        <p class="mb-0 fw-bold">{{ $order->shipping_address }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <h5 class="text-uppercase mb-4">Update Status</h5>
                <form action="{{ route('admin.orders.update-status', $order->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <select name="status" class="form-select">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-dark w-100">Update Order Status</button>
                </form>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4">
                <h5 class="text-uppercase mb-4">Order Summary State</h5>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Current status</span>
                    <span class="badge 
                        @if($order->status == 'pending') bg-warning 
                        @elseif($order->status == 'processing') bg-info 
                        @elseif($order->status == 'completed') bg-success 
                        @else bg-danger @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>
                <hr>
                <a href="{{ route('admin.orders.print', $order->id) }}" target="_blank" class="btn btn-outline-dark btn-sm w-100 mt-2 mb-2"><i class="ti ti-printer"></i> Print Invoice</a>
                <button class="btn btn-outline-dark btn-sm w-100"><i class="ti ti-mail"></i> Resend Email Invoice</button>
            </div>
        </div>
    </div>
</div>
@endsection
