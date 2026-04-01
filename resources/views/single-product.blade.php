<!DOCTYPE html>
<html>
<head>
    <title>{{ $product->name }} | Octal Traders</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
</head>
<body class="bg-light">
    @include('partials.header')

    <section class="padding-large pt-5 mt-5 pb-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm p-4">
                        <img src="{{ $product->image ? asset($product->image) : asset('images/product-item1.jpg') }}" alt="{{ $product->name }}" class="img-fluid rounded" style="width: 100%; height: auto; object-fit: contain;">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="products-content">
                        <div class="display-header mb-4">
                            <h2 class="display-7 text-dark text-uppercase mb-2">{{ $product->name }}</h2>
                            <p class="text-muted small text-uppercase fw-bold m-0"><span class="badge bg-light text-dark shadow-sm">{{ $product->category }}</span></p>
                            <p class="text-muted small text-uppercase fw-bold mt-1">Brand: <span class="text-dark">{{ $product->brand ?? 'N/A' }}</span></p>
                        </div>
                        <div class="price mb-4">
                            <span class="fs-4 fw-bold text-primary">${{ $product->price }}</span>
                        </div>
                        <div class="stock-status mb-4">
                            @if($product->quantity > 0)
                            <span class="badge bg-success shadow-sm">In Stock ({{ $product->quantity }})</span>
                            @else
                            <span class="badge bg-danger shadow-sm">Out of Stock</span>
                            @endif
                        </div>
                        <div class="description mb-4">
                            <h6 class="text-uppercase mb-2">Product Description</h6>
                            <p class="text-secondary">{{ $product->description ?? 'No description available for this product.' }}</p>
                        </div>
                        <div class="cart-action mb-4 pt-3">
                            <a href="{{ route('cart.add', $product->id) }}" class="btn btn-dark btn-medium px-5 text-uppercase rounded-0">Add to Cart</a>
                            <a href="#" class="btn btn-outline-dark btn-medium px-4 ms-2 text-uppercase rounded-0"><i class="ti ti-heart"></i> Wishlist</a>
                        </div>
                        <div class="extra-info pt-4 border-top">
                            <ul class="list-unstyled small text-muted text-uppercase fw-bold m-0">
                                <li class="mb-2">SKU: <span class="text-dark">{{ $product->code }}</span></li>
                                <li class="mb-2">Category: <span class="text-dark">{{ $product->category }}</span></li>
                                <li>Tags: <span class="text-dark">Electronic, Mobile, Global</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')
</body>
</html>
