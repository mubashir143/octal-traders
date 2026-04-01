@extends('layouts.admin')

@section('title', 'Orders')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="fs-3 mb-1">Orders</h1>
                <p class="mb-0">Manage and track customer orders</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card table-responsive">
            <table class="table mb-0 text-nowrap table-hover">
                <thead class="table-light border-light">
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr class="align-middle">
                        <td>#{{ $order->id }}</td>
                        <td>
                            <div class="fw-bold">{{ $order->customer_name }}</div>
                            <small class="text-muted">{{ $order->customer_email }}</small>
                        </td>
                        <td>${{ number_format($order->total_amount, 2) }}</td>
                        <td>
                            <span class="badge 
                                @if($order->status == 'pending') bg-warning 
                                @elseif($order->status == 'processing') bg-info 
                                @elseif($order->status == 'completed') bg-success 
                                @else bg-danger @endif">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>{{ $order->created_at->format('M d, Y') }}</td>
                        <td>
                            <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-outline-primary">View Details</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection
