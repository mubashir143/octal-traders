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
                <!-- Sidebar -->
                <div class="col-lg-3 mb-5">
                    <div class="category-sidebar p-4 rounded-4 shadow-sm bg-white border">
                        <h5 class="text-uppercase fw-bold mb-4" style="color: #1a1a2e; letter-spacing: 1px;">Categories</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2">
                                <a href="{{ route('shop') }}" class="category-link {{ !request('category') ? 'active' : '' }}">
                                    All Products
                                </a>
                            </li>
                            @foreach($categories as $category)
                            <li class="mb-2">
                                <a href="{{ route('shop', ['category' => $category->slug]) }}" 
                                   class="category-link {{ request('category') == $category->slug ? 'active' : '' }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="col-lg-9">
                    <div class="display-header d-flex justify-content-between align-items-center pb-4">
                        <h2 class="display-7 text-dark text-uppercase mb-0">
                            @if(request('category'))
                                {{ \App\Models\Category::where('slug', request('category'))->first()->name ?? 'Shop' }}
                            @else
                                Shop All Products
                            @endif
                        </h2>
                        <span class="text-muted small">{{ $products->total() }} Products found</span>
                    </div>
                    
                    <style>
                      .category-sidebar { position: sticky; top: 120px; }
                      .category-link { display: block; padding: 10px 15px; border-radius: 8px; color: #444; font-weight: 500; text-decoration: none; transition: all 0.2s; }
                      .category-link:hover { background: rgba(230,98,57,0.05); color: #e66239; transform: translateX(5px); }
                      .category-link.active { background: #1a1a2e; color: #fff; font-weight: 600; }
                      
                      .product-card-custom { transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1); border-radius: 16px; overflow: hidden; background: #fff; box-shadow: 0 4px 15px rgba(0,0,0,0.04); border: 1px solid #f2f2f2; height: 100%; display: flex; flex-direction: column; }
                      .product-card-custom:hover { transform: translateY(-8px); box-shadow: 0 15px 35px rgba(0,0,0,0.1); border-color: transparent; }
                      .product-card-custom .image-holder { overflow: hidden; position: relative; }
                      .product-card-custom .image-holder img { transition: transform 0.6s ease; object-fit: cover; }
                      .product-card-custom:hover .image-holder img { transform: scale(1.08); }
                      .product-card-custom .product-title { font-weight: 700; font-size: 1.15rem; letter-spacing: -0.2px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.4; margin-bottom: 0.5rem; }
                      .product-card-custom .product-title a { color: #1a1a1a; text-decoration: none; transition: color 0.2s; }
                      .product-card-custom .product-title a:hover { color: #e66239; }
                      .product-card-custom .product-price { font-weight: 800; font-size: 1.35rem; color: #e66239; }
                      .product-card-custom .cart-btn-overlay { position: absolute; bottom: 15px; left: 0; right: 0; text-align: center; opacity: 0; transform: translateY(15px); transition: all 0.3s ease; z-index: 10; }
                      .product-card-custom:hover .cart-btn-overlay { opacity: 1; transform: translateY(0); }
                      .product-card-custom .cart-btn-overlay .btn { border-radius: 50px; padding: 10px 24px; font-weight: 600; box-shadow: 0 5px 15px rgba(0,0,0,0.2); background: #1a1a2e; border: none; }
                      .product-card-custom .cart-btn-overlay .btn:hover { background: #e66239; }
                    </style>

                    <div class="row g-4">
                        @forelse($products as $product)
                        <div class="col-md-4 col-sm-6 mb-4">
                            <div class="product-card-custom position-relative">
                                <a href="{{ route('product.show', $product->id) }}" class="image-holder d-block text-decoration-none">
                                    <img src="{{ $product->image ? asset($product->image) : asset('images/product-item1.jpg') }}" alt="{{ $product->name }}" class="img-fluid w-100" style="height: 250px;">
                                    <div class="cart-btn-overlay">
                                        <object><a href="{{ route('cart.add', $product->id) }}" class="btn btn-dark text-white">Add to Cart</a></object>
                                    </div>
                                </a>
                                <div class="card-detail p-4 d-flex flex-column flex-grow-1 bg-white">
                                    <div class="mb-2">
                                        <span class="text-muted small text-uppercase fw-bold">{{ $product->category }}</span>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
                                    </h3>
                                    <div class="mt-auto pt-3 d-flex justify-content-between align-items-center">
                                        <span class="product-price">${{ number_format($product->price, 2) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12 text-center py-5">
                            <div class="py-5">
                                <i class="ti ti-package-off display-1 text-muted mb-3"></i>
                                <h3 class="text-muted">No products found in this category.</h3>
                                <a href="{{ route('shop') }}" class="btn btn-outline-dark mt-3 rounded-pill px-4">Clear Filters</a>
                            </div>
                        </div>
                        @endforelse
                    </div>

                    <div class="mt-5 d-flex justify-content-center">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')
</body>
</html>
