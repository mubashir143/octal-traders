<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart | Octal Traders</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/main-logo.png') }}">
    <style>
        @media (max-width: 991px) {
            .padding-large { padding-top: 50px !important; padding-bottom: 50px !important; }
            .display-7 { font-size: 1.8rem !important; }
            
            /* Responsive Table to Cards */
            .table thead { display: none; }
            .table tr { 
                display: block; 
                border: 1px solid #eee; 
                border-radius: 15px; 
                margin-bottom: 20px; 
                padding: 15px;
                background: white;
            }
            .table td { 
                display: flex; 
                justify-content: space-between; 
                align-items: center; 
                padding: 10px 0 !important;
                border: none !important;
            }
            .table td::before { 
                content: attr(data-label); 
                font-weight: bold; 
                text-transform: uppercase; 
                font-size: 0.75rem; 
                color: #666;
            }
            .table td:first-child { display: block; text-align: center; }
            .table td:first-child::before { display: none; }
            .table td:last-child { justify-content: center; }
        }
    </style>
</head>
<body class="bg-light">
    <!-- SVG SYMBOLS START -->
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol xmlns="http://www.w3.org/2000/svg" id="cart" viewBox="0 0 16 16">
          <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>
    <!-- SVG SYMBOLS END -->

    @include('partials.header')

    <section class="padding-large pt-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="display-7 text-dark text-uppercase mb-4">Your Shopping Cart</h2>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(count($cart) > 0)
            <div class="row">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-0">
                            <table class="table table-borderless align-middle mb-0">
                                <thead class="bg-white border-bottom">
                                    <tr class="text-uppercase small fw-bold text-muted">
                                        <th class="p-3">Product</th>
                                        <th class="p-3">Price</th>
                                        <th class="p-3">Quantity</th>
                                        <th class="p-3">Total</th>
                                        <th class="p-3"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart as $id => $details)
                                    <tr class="border-bottom" data-id="{{ $id }}">
                                        <td class="p-3" data-label="Product">
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $details['image'] ? asset($details['image']) : asset('images/product-item1.jpg') }}" alt="product" class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                                <div class="ms-3">
                                                    <h6 class="mb-0 text-uppercase">{{ $details['name'] }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-3" data-label="Price">Rs. {{ $details['price'] }}</td>
                                        <td class="p-3" data-label="Quantity" style="width: 130px;">
                                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity update-cart" min="1">
                                        </td>
                                        <td class="p-3" data-label="Total">Rs. {{ $details['price'] * $details['quantity'] }}</td>
                                        <td class="p-3 text-end">
                                            <button class="btn btn-sm btn-outline-danger remove-from-cart border-0 shadow-none"><i class="ti ti-trash"></i> Remove</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mb-4">
                        <a href="{{ route('shop') }}" class="btn btn-link text-dark text-uppercase p-0 text-decoration-none small">
                            <i class="ti ti-arrow-left"></i> Continue Shopping
                        </a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-4">
                            <h5 class="text-uppercase mb-4">Order Summary</h5>
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Subtotal</span>
                                <span>Rs. {{ $total }}</span>
                            </div>
                            <div class="d-flex justify-content-between mb-4">
                                <span class="text-muted">Shipping</span>
                                <span class="text-success">Free</span>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-4">
                                <span class="fw-bold text-uppercase">Total</span>
                                <span class="fw-bold fs-5">Rs. {{ $total }}</span>
                            </div>
                            <a href="{{ route('checkout') }}" class="btn btn-dark btn-medium w-100 text-uppercase rounded-0">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="row">
                <div class="col-12 text-center py-5">
                    <div class="mb-4">
                        <svg class="cart text-muted" width="80" height="80">
                          <use xlink:href="#cart"></use>
                        </svg>
                    </div>
                    <h3 class="mb-3">Your cart is empty!</h3>
                    <p class="text-muted mb-4">Looks like you haven't added anything to your cart yet.</p>
                    <a href="{{ route('shop') }}" class="btn btn-dark btn-medium text-uppercase rounded-0">Back to Shop</a>
                </div>
            </div>
            @endif
        </div>
    </section>

    @include('partials.footer')

    <script type="text/javascript">
        $(".update-cart").change(function (e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '{{ route('cart.update') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id"), 
                    quantity: ele.val()
                },
                success: function (response) {
                   window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure you want to remove this product?")) {
                $.ajax({
                    url: '{{ route('cart.remove') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}', 
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
</body>
</html>
