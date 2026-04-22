<!DOCTYPE html>
<html>
<head>
    <title>{{ $product->name }} | Octal Traders</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/main-logo.png') }}">
    <style>
        .product-content-area {
            line-height: 1.6;
            color: #4B5563;
        }
        .product-content-area ul, .product-content-area ol {
            padding-left: 1.5rem;
            margin-bottom: 1rem;
        }
        .product-content-area h1, .product-content-area h2, .product-content-area h3 {
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
            color: #111827;
        }
        .product-content-area p {
            margin-bottom: 1rem;
        }
        .product-content-area strong {
            font-weight: 700;
            color: #111827;
        }

        @media (max-width: 991px) {
            .padding-large { padding-top: 40px !important; padding-bottom: 40px !important; }
            #main-image-display { height: 350px !important; }
            .display-7 { font-size: 1.8rem !important; }
            .thumb-item img { height: 60px !important; }
            .reviews-section { padding-top: 20px !important; }
            .write-review { position: static !important; margin-top: 30px; }
        }
        @media (max-width: 576px) {
            #main-image-display { height: 280px !important; }
            .display-7 { font-size: 1.5rem !important; }
        }
    </style>
</head>
<body class="bg-light">
    @include('partials.header')

    <section class="padding-large pt-5 mt-5 pb-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="product-gallery">
                        <div class="main-image card border-0 shadow-sm p-3 mb-3">
                            <img id="main-image-display" src="{{ $product->image ? asset($product->image) : asset('images/product-item1.jpg') }}" alt="{{ $product->name }}" class="img-fluid rounded" style="width: 100%; height: 500px; object-fit: contain;">
                        </div>
                        <div class="thumbnail-list row g-2">
                            <div class="col-3">
                                <div class="thumb-item border rounded p-1 cursor-pointer active" onclick="changeImage('{{ asset($product->image) }}', this)">
                                    <img src="{{ asset($product->image) }}" class="img-fluid rounded" style="height: 80px; width: 100%; object-fit: cover;">
                                </div>
                            </div>
                            @foreach($product->images as $img)
                            <div class="col-3">
                                <div class="thumb-item border rounded p-1 cursor-pointer" onclick="changeImage('{{ asset($img->image_path) }}', this)">
                                    <img src="{{ asset($img->image_path) }}" class="img-fluid rounded" style="height: 80px; width: 100%; object-fit: cover;">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <script>
                    function changeImage(path, element) {
                        document.getElementById('main-image-display').src = path;
                        document.querySelectorAll('.thumb-item').forEach(item => item.classList.remove('active', 'border-primary'));
                        element.classList.add('active', 'border-primary');
                    }
                </script>

                <style>
                    .thumb-item { cursor: pointer; transition: all 0.2s; }
                    .thumb-item:hover { border-color: #e66239 !important; }
                    .thumb-item.active { border-color: #e66239 !important; border-width: 2px !important; }
                </style>
                <div class="col-lg-6">
                    <div class="products-content">
                        <div class="display-header mb-4">
                            <h2 class="display-7 text-dark text-uppercase mb-2">{{ $product->name }}</h2>
                            <div class="product-rating mb-3 d-flex align-items-center gap-2">
                                <div class="stars text-warning d-flex">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="ti ti-star{{ $i <= round($product->rating) ? '-filled' : '' }} fs-5"></i>
                                    @endfor
                                </div>
                                <span class="text-muted small fw-bold">({{ $product->rating }} / 5.0) from {{ $product->reviews_count }} reviews</span>
                            </div>
                            <p class="text-muted small text-uppercase fw-bold m-0"><span class="badge bg-light text-dark shadow-sm">{{ $product->category }}</span></p>
                            <p class="text-muted small text-uppercase fw-bold mt-1">Brand: <span class="text-dark">{{ $product->brand ?? 'N/A' }}</span></p>
                        </div>
                        <div class="price mb-4 d-flex align-items-center gap-3">
                            <span class="fs-4 fw-bold text-primary">Rs. {{ $product->price }}</span>
                            @if($product->compare_at_price)
                                <span class="text-muted text-decoration-line-through fs-5">Rs. {{ $product->compare_at_price }}</span>
                                <span class="badge bg-danger text-white">SAVE {{ round((($product->compare_at_price - $product->price) / $product->compare_at_price) * 100) }}%</span>
                            @endif
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
                            <div class="text-secondary product-content-area">
                                {!! $product->description ?? 'No description available for this product.' !!}
                            </div>
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

    <section class="reviews-section padding-large pb-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="reviews-list">
                        <h4 class="text-uppercase mb-4">Customer Reviews ({{ $product->reviews_count }})</h4>
                        @forelse($product->reviews as $review)
                        <div class="review-item bg-white p-4 rounded shadow-sm mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h6 class="m-0 text-dark">{{ $review->user_name }}</h6>
                                    <small class="text-muted">{{ $review->created_at->format('M d, Y') }}</small>
                                </div>
                                <div class="text-warning">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="ti ti-star{{ $i <= $review->rating ? '-filled' : '' }}"></i>
                                    @endfor
                                </div>
                            </div>
                            <p class="m-0 text-secondary">{{ $review->comment }}</p>
                        </div>
                        @empty
                        <div class="alert alert-light border text-center py-5 rounded-4">
                            <i class="ti ti-message-2-question fs-1 text-muted mb-3 d-block"></i>
                            <p class="m-0">No reviews yet. Be the first to review this product!</p>
                        </div>
                        @endforelse
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="write-review card border-0 shadow-sm p-4 rounded-4 position-sticky" style="top: 100px;">
                        <h4 class="text-uppercase mb-4">Write a Review</h4>
                        <form action="{{ route('product.review.store', $product->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-uppercase">Your Name</label>
                                <input type="text" name="user_name" class="form-control rounded-3" value="{{ auth()->user()->name ?? '' }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold text-uppercase">Rating</label>
                                <div class="rating-input d-flex gap-2">
                                    @for($i = 1; $i <= 5; $i++)
                                    <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}" class="btn-check" required {{ $i == 5 ? 'checked' : '' }}>
                                    <label for="star{{ $i }}" class="btn btn-outline-warning btn-sm py-1 px-3 rounded-pill">
                                        {{ $i }} <i class="ti ti-star-filled"></i>
                                    </label>
                                    @endfor
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label small fw-bold text-uppercase">Your Review</label>
                                <textarea name="comment" class="form-control rounded-3" rows="4" placeholder="Share your experience..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-medium w-100 text-uppercase rounded-3 py-3">Submit Review</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')
</body>
</html>
