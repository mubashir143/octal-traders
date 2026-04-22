<!DOCTYPE html>
<html>
<head>
    <title>Shop | Octal Traders</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/main-logo.png') }}">
    <style>
      /* Modern Sidebar Styles */
      .filter-card {
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid rgba(0,0,0,0.05);
        box-shadow: 0 10px 30px rgba(0,0,0,0.02);
        transition: all 0.3s ease;
      }
      .filter-card:hover {
        box-shadow: 0 15px 45px rgba(0,0,0,0.05);
      }
      .filter-title {
        background: #f8fafc;
        padding: 15px 20px;
        font-size: 0.85rem;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #1e293b;
        border-bottom: 1px solid #f1f5f9;
        margin-bottom: 0;
      }
      .filter-link {
        display: flex;
        align-items: center;
        padding: 10px 20px;
        color: #64748b;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.2s ease;
      }
      .filter-link .dot {
        width: 6px;
        height: 6px;
        background: #cbd5e1;
        border-radius: 50%;
        margin-right: 12px;
        transition: all 0.2s ease;
      }
      .filter-link:hover {
        color: #e66239;
        background: rgba(230, 98, 57, 0.03);
      }
      .filter-link:hover .dot {
        background: #e66239;
        transform: scale(1.5);
      }
      .filter-link.active {
        color: #e66239;
        background: rgba(230, 98, 57, 0.05);
      }
      .filter-link.active .dot {
        background: #e66239;
        transform: scale(1.5);
        box-shadow: 0 0 10px rgba(230, 98, 57, 0.4);
      }

      @media (max-width: 991px) {
        .filter-sidebar { margin-bottom: 30px; }
        .padding-large { padding-top: 50px !important; padding-bottom: 50px !important; }
        .display-7 { font-size: 1.8rem !important; }
        .display-header { flex-direction: column; align-items: flex-start !important; gap: 10px; }
        
        .product-card-custom .cart-btn-overlay { 
          opacity: 1; 
          top: auto;
          bottom: 15px;
          background: transparent; 
          backdrop-filter: none; 
          pointer-events: all; 
          padding: 0 10px;
        }
        .product-card-custom .cart-btn-overlay .btn { 
          padding: 6px 12px; 
          font-size: 0.7rem;
          box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
      }
      @media (max-width: 576px) {
        .display-7 { font-size: 1.5rem !important; }
        .padding-large { padding-top: 40px !important; padding-bottom: 40px !important; }
      }
    </style>
</head>
<body>
    @include('partials.header')

    <section class="padding-large">
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-3 mb-5">
                    <div class="filter-sidebar">
                        <!-- Categories Section -->
                        <div class="filter-card mb-4">
                            <h5 class="filter-title">Categories</h5>
                            <div class="filter-content">
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2">
                                        <a href="{{ route('shop') }}" class="filter-link {{ !request('category') ? 'active' : '' }}">
                                            <span class="dot"></span>
                                            All Products
                                        </a>
                                    </li>
                                    @foreach($categories as $category)
                                    <li class="mb-2">
                                        <a href="{{ route('shop', ['category' => $category->slug]) }}" 
                                           class="filter-link {{ request('category') == $category->slug ? 'active' : '' }}">
                                            <span class="dot"></span>
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Price Filter Section -->
                        <div class="filter-card">
                            <h5 class="filter-title">Price Range</h5>
                            <div class="filter-content p-3">
                                <form action="{{ route('shop') }}" method="GET">
                                    @if(request('category'))
                                        <input type="hidden" name="category" value="{{ request('category') }}">
                                    @endif
                                    @if(request('filter'))
                                        <input type="hidden" name="filter" value="{{ request('filter') }}">
                                    @endif
                                    @if(request('search'))
                                        <input type="hidden" name="search" value="{{ request('search') }}">
                                    @endif

                                    <div class="row g-2 mb-3">
                                        <div class="col-6">
                                            <label class="small text-muted mb-1">Min (Rs.)</label>
                                            <input type="number" name="min_price" class="form-control form-control-sm border-0 bg-light" value="{{ request('min_price') }}" placeholder="0">
                                        </div>
                                        <div class="col-6">
                                            <label class="small text-muted mb-1">Max (Rs.)</label>
                                            <input type="number" name="max_price" class="form-control form-control-sm border-0 bg-light" value="{{ request('max_price') }}" placeholder="5000">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-dark w-100 btn-sm rounded-pill py-2">Apply Filter</button>
                                    @if(request('min_price') || request('max_price'))
                                        <a href="{{ request()->fullUrlWithQuery(['min_price' => null, 'max_price' => null]) }}" class="btn btn-link btn-sm w-100 text-decoration-none text-muted mt-1 small">Reset Price</a>
                                    @endif
                                </form>
                            </div>
                        </div>
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

                    <div class="row g-4">
                        @if($bundleDeals->count() > 0)
                        <div class="col-12">
                            <h3 class="fs-4 mb-4 text-primary fw-bold"><i class="ti ti-gift me-2"></i>Featured Bundle Deals</h3>
                        </div>
                        @foreach($bundleDeals as $deal)
                        <div class="col-12 mb-5">
                            <div class="card border-primary border-2 shadow-sm rounded-4 overflow-hidden">
                                <div class="card-body p-0">
                                    <div class="row g-0">
                                        <div class="col-md-8 p-4">
                                            <span class="badge bg-primary mb-2">Bundle Deal</span>
                                            <h4 class="fw-bold mb-2">{{ $deal->name }}</h4>
                                            <p class="text-muted small mb-4">{{ $deal->description }}</p>
                                            
                                            <div class="d-flex flex-wrap gap-4 align-items-center">
                                                <div class="d-flex align-items-center gap-3">
                                                    @foreach($deal->products->take(3) as $dp)
                                                        <div class="text-center">
                                                            <img src="{{ asset($dp->image ?? 'images/product-item1.jpg') }}" alt="" class="rounded shadow-sm" style="width: 60px; height: 60px; object-fit: cover;">
                                                            <div class="small text-muted mt-1" style="font-size: 0.65rem; max-width: 60px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $dp->name }}</div>
                                                        </div>
                                                    @endforeach
                                                    @if($deal->products->count() > 3)
                                                        <span class="text-muted small">+{{ $deal->products->count() - 3 }} more</span>
                                                    @endif
                                                </div>
                                                
                                                <div class="ms-auto text-end">
                                                    <div class="text-muted small text-decoration-line-through">Regular Price: Rs. {{ number_format($deal->products->sum('price'), 2) }}</div>
                                                    <div class="fs-3 fw-bold text-primary">Bundle Price: Rs. {{ number_format($deal->deal_price, 2) }}</div>
                                                    <a href="{{ route('cart.add-deal', $deal->id) }}" class="btn btn-primary mt-2 px-4 rounded-pill">Buy Bundle</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 bg-light d-flex align-items-center justify-content-center p-4 border-start">
                                            <div class="text-center">
                                                <i class="ti ti-package fs-1 text-primary mb-2"></i>
                                                <div class="fw-bold">Ready to ship</div>
                                                <div class="small text-muted">Limited time offer</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-12 mt-4">
                            <h3 class="fs-4 mb-4 fw-bold">Individual Product Deals</h3>
                        </div>
                        @endif

                        @forelse($products as $product)
                        <div class="col-md-4 col-sm-6 mb-4">
                            <div class="product-card-custom position-relative h-100">
                                <a href="{{ route('product.show', $product->id) }}" class="card-link-overlay"></a>
                                <div class="image-holder d-block">
                                    <img src="{{ $product->image ? asset($product->image) : asset('images/product-item1.jpg') }}" alt="{{ $product->name }}" class="img-fluid w-100" style="height: 250px;">
                                    <div class="cart-btn-overlay">
                                        <div class="d-flex flex-column gap-2 px-4 w-100">
                                            <a href="{{ route('cart.add', $product->id) }}" class="btn btn-dark text-white py-2">Add to Cart</a>
                                            <a href="{{ route('cart.buy', $product->id) }}" class="btn btn-primary text-white py-2">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-detail p-4 d-flex flex-column flex-grow-1 bg-white">
                                    <div class="product-rating mb-2 d-flex align-items-center gap-1">
                                        <div class="stars text-warning">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="ti ti-star{{ $i <= round($product->rating) ? '-filled' : '' }} fs-6"></i>
                                            @endfor
                                        </div>
                                        <span class="text-muted small">({{ $product->reviews_count }})</span>
                                    </div>
                                    <h3 class="product-title">
                                        <a href="{{ route('product.show', $product->id) }}" style="position: relative; z-index: 10;">{{ $product->name }}</a>
                                    </h3>
                                    <div class="mt-auto pt-3 d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="product-price">Rs. {{ number_format($product->price, 2) }}</span>
                                            @if($product->compare_at_price)
                                                <span class="text-muted text-decoration-line-through small">Rs. {{ number_format($product->compare_at_price, 2) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12 text-center py-5">
                            <div class="py-5">
                                <i class="ti ti-package-off display-1 text-muted mb-3 d-block"></i>
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
