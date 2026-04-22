@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="mb-6">
            <h1 class="fs-3 mb-1">Dashboard</h1>
            <p>Welcome to your admin dashboard.</p>
        </div>
    </div>
</div>
<div class="row g-3 mb-3">
    <div class="col-lg-3 col-12">
        <div class="card p-4 bg-primary bg-opacity-10 border border-primary border-opacity-25 rounded-2">
            <div class="d-flex gap-3 ">
                <div class="icon-shape icon-md bg-primary text-white rounded-2">
                    <i class="ti ti-report-analytics fs-4"></i>
                </div>
                <div>
                    <h2 class="mb-3 fs-6">Total Sales</h2>
                    <h3 class="fw-bold mb-0">Rs. {{ number_format($totalSales, 2) }}</h3>
                    <p class="text-primary mb-0 small">From completed orders</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-12">
        <div class="card p-4 bg-success bg-opacity-10 border border-success border-opacity-25 rounded-2">
            <div class="d-flex gap-3 ">
                <div class="icon-shape icon-md bg-success text-white rounded-2">
                    <i class="ti ti-box fs-4"></i>
                </div>
                <div>
                    <h2 class="mb-3 fs-6">Total Products</h2>
                    <h3 class="fw-bold mb-0">{{ $totalProducts }}</h3>
                    <p class="text-success mb-2 small">Live in catalog</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-12">
        <div class="card p-4 bg-info bg-opacity-10 border border-info border-opacity-25 rounded-2">
            <div class="d-flex gap-3 ">
                <div class="icon-shape icon-md bg-info text-white rounded-2">
                    <i class="ti ti-users fs-4"></i>
                </div>
                <div>
                    <h2 class="mb-3 fs-6">Total Customers</h2>
                    <h3 class="fw-bold mb-0">{{ $totalCustomers }}</h3>
                    <p class="text-info mb-2 small">Registered accounts</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-12">
        <div class="card p-4 bg-warning bg-opacity-10 border border-warning border-opacity-25 rounded-2">
            <div class="d-flex gap-3 ">
                <div class="icon-shape icon-md bg-warning text-white rounded-2">
                    <i class="ti ti-alert-triangle fs-4"></i>
                </div>
                <div>
                    <h2 class="mb-3 fs-6">Out of Stock</h2>
                    <h3 class="fw-bold mb-0 text-danger">{{ $outOfStock }}</h3>
                    <p class="text-warning mb-2 small">Action required</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-3 mb-3">
    <div class="col-lg-4 col-12">
        <div class="card">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between border-bottom pb-5 mb-3">
                    <div>
                        <h3 class="fw-bold h4">$25,458</h3>
                        <span>Total Profit</span>
                    </div>
                    <div><i class="ti ti-layers-subtract fs-1 text-primary"></i></div>
                </div>
                <div class="d-flex justify-content-between align-items-center small">
                    <div class="text-muted"><span class="text-success">+35%</span> vs Last Month</div>
                    <div><a href="#" class="link-primary text-decoration-underline">View</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-12">
        <div class="card">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between border-bottom pb-5 mb-3">
                    <div>
                        <h3 class="fw-bold h4">$45,458</h3>
                        <span>Total Payment Returns</span>
                    </div>
                    <div><i class="ti ti-credit-card fs-1 text-danger"></i></div>
                </div>
                <div class="d-flex justify-content-between align-items-center small">
                    <div class="text-muted"><span class="text-danger">-20%</span> vs Last Month</div>
                    <div><a href="#" class="link-primary text-decoration-underline">View</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-12">
        <div class="card">
            <div class="card-body p-4">
                <div class="d-flex justify-content-between border-bottom pb-5 mb-3">
                    <div>
                        <h3 class="fw-bold h4">$34,458</h3>
                        <span>Total Expenses</span>
                    </div>
                    <div><i class="ti ti-cash-banknote fs-1 text-warning"></i></div>
                </div>
                <div class="d-flex justify-content-between align-items-center small">
                    <div class="text-muted"><span class="text-warning">-20%</span> vs Last Month</div>
                    <div><a href="#" class="link-primary text-decoration-underline">View</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
