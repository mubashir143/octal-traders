<!DOCTYPE html>
<html>
<head>
    <title>Checkout | Octal Traders</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
</head>
<body class="bg-light">
    @include('partials.header')

    <section class="padding-large pt-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="display-7 text-dark text-uppercase mb-4">Checkout</h2>
                </div>
            </div>

            <form action="{{ route('order.place') }}" method="POST">
                @csrf
                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="card border-0 shadow-sm p-4">
                            <h5 class="text-uppercase mb-4">Shipping Information</h5>
                            
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="customer_name" class="form-label text-muted small text-uppercase">Full Name</label>
                                    <input type="text" class="form-control" name="customer_name" id="customer_name" placeholder="Enter your full name" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="customer_email" class="form-label text-muted small text-uppercase">Email Address</label>
                                    <input type="email" class="form-control" name="customer_email" id="customer_email" placeholder="example@domain.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="customer_phone" class="form-label text-muted small text-uppercase">Phone Number</label>
                                    <input type="text" class="form-control" name="customer_phone" id="customer_phone" placeholder="+1 (123) 456-7890" required>
                                </div>
                                <div class="col-12">
                                    <label for="shipping_address" class="form-label text-muted small text-uppercase">Shipping Address</label>
                                    <textarea class="form-control" name="shipping_address" id="shipping_address" rows="4" placeholder="Enter your full shipping address" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm p-4">
                            <h5 class="text-uppercase mb-4">Your Order</h5>
                            <ul class="list-unstyled mb-4">
                                @foreach($cart as $id => $details)
                                <li class="d-flex justify-content-between mb-2">
                                    <span class="text-muted small text-uppercase fw-bold">{{ $details['name'] }} <span class="ms-1">x {{ $details['quantity'] }}</span></span>
                                    <span class="small fw-bold">${{ $details['price'] * $details['quantity'] }}</span>
                                </li>
                                @endforeach
                            </ul>
                            <hr>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Subtotal</span>
                                <span>${{ $total }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Shipping</span>
                                <span class="text-success">Free</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-4">
                                <span class="fw-bold text-uppercase">Total</span>
                                <span class="fw-bold fs-5">${{ $total }}</span>
                            </div>
                            <div class="alert alert-info border-0 p-3 small mb-4">
                                <i class="ti ti-info-circle"></i> We currently only support Cash on Delivery for all orders.
                            </div>
                            <button type="submit" class="btn btn-dark btn-medium w-100 text-uppercase rounded-0">Place Order Now</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    @include('partials.footer')
</body>
</html>
