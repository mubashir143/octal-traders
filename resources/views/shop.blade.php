<!DOCTYPE html>
<html>
<head>
    <title>Shop | Octal Traders</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
</head>
<body>
    @include('partials.header')

    <section class="padding-large">
        <div class="container">
            <div class="row">
                <div class="display-header d-flex justify-content-between pb-3">
                    <h2 class="display-7 text-dark text-uppercase">Shop All Products</h2>
                </div>
                
                <div class="row g-4">
                    @foreach($products as $product)
                    <div class="col-lg-3 col-md-6">
                        <div class="product-card position-relative">
                            <div class="image-holder">
                                <img src="{{ $product->image ? asset($product->image) : asset('images/product-item1.jpg') }}" alt="{{ $product->name }}" class="img-fluid" style="height: 300px; object-fit: cover; width: 100%;">
                            </div>
                            <div class="cart-concern position-absolute">
                                <div class="cart-button d-flex">
                                    <a href="{{ route('cart.add', $product->id) }}" class="btn btn-medium btn-black">Add to Cart</a>
                                </div>
                            </div>
                            <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                                <h3 class="card-title text-uppercase">
                                    <a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
                                </h3>
                                <span class="item-price text-primary">${{ $product->price }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <div class="mt-5 d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')
</body>
</html>
