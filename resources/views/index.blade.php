<!DOCTYPE html>
<html>
<head>
  <title>Octal Traders</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <style>
    .swiper-arrow { transition: all 0.3s ease; border: 1px solid rgba(0,0,0,0.1); }
    .swiper-arrow:hover { background-color: var(--primary-color) !important; color: white !important; border-color: var(--primary-color) !important; transform: translateY(-50%) scale(1.1); }
  </style>
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" tabindex="0">
  
  @include('partials.header')

  <style>
    .billboard-v3 {
      height: 550px;
      margin-top: 90px;
      padding: 0;
      background: #f8fafc;
      overflow: hidden;
    }
    
    .parallax-bg {
      position: absolute;
      left: 0;
      top: 0;
      width: 130%;
      height: 100%;
      background-size: cover;
      background-position: center;
      filter: brightness(0.9);
      opacity: 0.15;
    }
    
    .billboard-v3::after {
      content: '';
      position: absolute;
      inset: 0;
      background: linear-gradient(90deg, rgba(248, 250, 252, 1) 0%, rgba(248, 250, 252, 0.4) 50%, rgba(248, 250, 252, 1) 100%);
      z-index: 0;
    }

    .banner-glass-card {
      background: rgba(255, 255, 255, 0.4);
      backdrop-filter: blur(20px) saturate(160%);
      -webkit-backdrop-filter: blur(20px) saturate(160%);
      border: 1px solid rgba(255,255,255,0.4);
      border-radius: 40px;
      padding: 60px;
      box-shadow: 0 40px 100px rgba(0,0,0,0.08);
      transform: translateY(40px);
      transition: all 1s cubic-bezier(0.2, 1, 0.2, 1);
      opacity: 0;
      z-index: 2;
    }

    .swiper-slide-active .banner-glass-card {
      transform: translateY(0);
      opacity: 1;
    }

    .display-banner {
      font-weight: 900;
      font-size: 3.8rem;
      letter-spacing: -2.5px;
      line-height: 1.05;
      margin-bottom: 25px;
      color: var(--dark-color);
    }

    .floating-badge {
      display: inline-block;
      background: rgba(230, 98, 57, 0.1);
      color: var(--primary-color);
      padding: 8px 20px;
      border-radius: 50px;
      font-weight: 700;
      font-size: 0.85rem;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 20px;
    }

    .banner-img-wrap {
      position: relative;
      perspective: 1000px;
    }

    .banner-img-floating {
      border-radius: 30px;
      box-shadow: 0 50px 80px rgba(0,0,0,0.15);
      animation: floating 6s ease-in-out infinite;
      border: 8px solid white;
    }

    @keyframes floating {
      0% { transform: translatey(0px); }
      50% { transform: translatey(-20px); }
      100% { transform: translatey(0px); }
    }

    .swiper-arrow-custom {
      width: 50px;
      height: 50px;
      border-radius: 15px;
      background: white;
      border: none;
      box-shadow: 0 10px 20px rgba(0,0,0,0.05);
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--dark-color);
    }

    .swiper-arrow-custom:hover {
      background: var(--primary-color);
      color: white;
      transform: scale(1.1);
    }
  </style>

  <section id="billboard" class="billboard-v3 position-relative">
    <div class="swiper main-swiper h-100" data-parallax="true">
      <div class="swiper-wrapper">
        @forelse($banners as $banner)
        <div class="swiper-slide d-flex align-items-center">
            <!-- Parallax Background Element -->
            <div class="parallax-bg" style="background-image: url('{{ asset($banner->image) }}'); opacity: 0.1;" data-swiper-parallax="-30%"></div>
            
            <div class="container position-relative z-1">
              <div class="row align-items-center g-5">
                <div class="col-lg-6" data-swiper-parallax="-300">
                  <div class="banner-glass-card">
                    <span class="floating-badge">Octal Traders Exclusive</span>
                    <h1 class="display-banner">{{ $banner->title }}</h1>
                    <p class="lead mb-4 text-muted fs-5">{{ $banner->subtitle }}</p>
                    <a href="{{ $banner->button_link ?? route('shop') }}" class="btn btn-premium btn-lg">
                      {{ $banner->button_text ?? 'Explore Market' }}
                    </a>
                  </div>
                </div>
                <div class="col-lg-6 text-center" data-swiper-parallax="-500">
                  <div class="banner-img-wrap">
                    <img src="{{ asset($banner->image) }}" alt="banner" class="img-fluid banner-img-floating" style="max-height: 420px; width: auto; object-fit: contain;">
                  </div>
                </div>
              </div>
            </div>
        </div>
        @empty
        <div class="swiper-slide d-flex align-items-center">
            <div class="parallax-bg" style="background-image: url('images/banner-image.png'); opacity: 0.1;" data-swiper-parallax="-30%"></div>
            <div class="container position-relative z-1">
              <div class="row align-items-center">
                <div class="col-lg-6">
                  <div class="banner-glass-card">
                    <span class="floating-badge">Welcome to Octal</span>
                    <h1 class="display-banner">Your Products Are Great.</h1>
                    <a href="{{ route('shop') }}" class="btn btn-premium btn-lg">Shop Now</a>
                  </div>
                </div>
                <div class="col-lg-6 text-center">
                  <img src="images/banner-image.png" alt="banner" class="img-fluid banner-img-floating" style="max-height: 400px;">
                </div>
              </div>
            </div>
        </div>
        @endforelse
      </div>

      <!-- Navigation Custom -->
      <div class="container position-absolute bottom-0 start-50 translate-middle-x pb-5 z-3 d-none d-md-block">
        <div class="d-flex gap-3 justify-content-end">
          <button class="swiper-arrow-custom swiper-arrow-prev"><i class="ti ti-chevron-left"></i></button>
          <button class="swiper-arrow-custom swiper-arrow-next"><i class="ti ti-chevron-right"></i></button>
        </div>
      </div>
      
      <!-- Pagination -->
      <div class="swiper-pagination"></div>
    </div>
  </section>

  <section id="company-services" class="padding-large">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6 pb-3">
          <div class="icon-box d-flex">
            <div class="icon-box-icon pe-3 pb-3">
              <svg class="cart-outline" width="40" height="40"><use xlink:href="#cart-outline" /></svg>
            </div>
            <div class="icon-box-content">
              <h3 class="card-title text-uppercase text-dark">Free delivery</h3>
              <p>Consectetur adipi elit lorem ipsum dolor sit amet.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 pb-3">
          <div class="icon-box d-flex">
            <div class="icon-box-icon pe-3 pb-3">
              <svg class="quality" width="40" height="40"><use xlink:href="#quality" /></svg>
            </div>
            <div class="icon-box-content">
              <h3 class="card-title text-uppercase text-dark">Quality guarantee</h3>
              <p>Dolor sit amet orem ipsu mcons ectetur adipi elit.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="categories" class="padding-large no-padding-top">
    <div class="container">
      <div class="display-header d-flex justify-content-between pb-3">
        <h2 class="display-7 text-dark text-uppercase">Shop By Category</h2>
      </div>
      <div class="row g-4 d-flex justify-content-start">
        @foreach($categories as $category)
        <div class="col-lg-2 col-md-4 col-6 text-center">
          <a href="{{ route('shop', ['category' => $category->slug]) }}" class="text-decoration-none">
            <div class="card border-0 shadow-sm p-4 category-card bg-light h-100 d-flex justify-content-center align-items-center">
              <h6 class="text-uppercase m-0 fw-bold">{{ $category->name }}</h6>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  <style>
    .category-card { transition: all 0.3s ease; border-radius: 12px; }
    .category-card:hover { transform: translateY(-5px); background: var(--primary-color) !important; box-shadow: 0 10px 20px rgba(230,98,57,0.2) !important; }
    .category-card:hover h6 { color: white; }
  </style>

  <section id="mobile-products" class="product-store position-relative padding-large no-padding-top">
    <div class="container">
      <div class="row">
        <div class="display-header d-flex justify-content-between pb-3">
          <h2 class="display-7 text-dark text-uppercase">Latest Products</h2>
          <div class="btn-right">
            <a href="{{ route('shop') }}" class="btn btn-medium btn-normal text-uppercase">Go to Shop</a>
          </div>
        </div>
        <style>
          .product-card-custom { transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1); border-radius: 16px; overflow: hidden; background: #fff; box-shadow: 0 4px 15px rgba(0,0,0,0.04); border: 1px solid #f2f2f2; height: 100%; display: flex; flex-direction: column; }
          .product-card-custom:hover { transform: translateY(-8px); box-shadow: 0 15px 35px rgba(0,0,0,0.1); border-color: transparent; }
          .product-card-custom .image-holder { overflow: hidden; position: relative; }
          .product-card-custom .image-holder img { transition: transform 0.6s ease; object-fit: cover; }
          .product-card-custom:hover .image-holder img { transform: scale(1.08); }
          .product-card-custom .product-title { font-weight: 700; font-size: 1.15rem; letter-spacing: -0.2px; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; line-height: 1.4; margin-bottom: 0.5rem; }
          .product-card-custom .product-title a { color: #1a1a1a; text-decoration: none; transition: color 0.2s; }
          .product-card-custom .product-title a:hover { color: var(--primary-color, #e66239); }
          .product-card-custom .product-price { font-weight: 800; font-size: 1.35rem; color: var(--primary-color, #e66239); }
          .product-card-custom .cart-btn-overlay { position: absolute; top: 0; bottom: 0; left: 0; right: 0; background: rgba(255,255,255,0.7); backdrop-filter: blur(4px); display: flex; align-items: center; justify-content: center; opacity: 0; transition: all 0.4s ease; z-index: 10; }
          .product-card-custom:hover .cart-btn-overlay { opacity: 1; }
          .product-card-custom .cart-btn-overlay .btn { border-radius: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; font-size: 0.8rem; }
        </style>
        <div class="row g-4">
          @foreach($products as $product)
          <div class="col-lg-3 col-md-6 mb-4">
            <div class="product-card-custom position-relative">
              <a href="{{ route('product.show', $product->id) }}" class="image-holder d-block text-decoration-none">
                <img src="{{ $product->image ? asset($product->image) : asset('images/product-item1.jpg') }}" alt="{{ $product->name }}" class="img-fluid w-100" style="height: 280px;">
                <div class="cart-btn-overlay">
                  <div class="d-flex flex-column gap-2 px-4 w-100">
                    <a href="{{ route('cart.add', $product->id) }}" class="btn btn-dark text-white py-2">Add to Cart</a>
                    <a href="{{ route('cart.buy', $product->id) }}" class="btn btn-primary text-white py-2">Buy Now</a>
                  </div>
                </div>
              </a>
              <div class="card-detail p-4 d-flex flex-column flex-grow-1 bg-white">
                <h3 class="product-title">
                  <a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a>
                </h3>
                <div class="mt-auto pt-3 d-flex justify-content-between align-items-center">
                  <span class="product-price">${{ number_format($product->price, 2) }}</span>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  @include('partials.footer')

  <!-- SVG icons needed for the page -->
  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="cart" viewBox="0 0 16 16"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" /></symbol>
    <symbol id="cart-outline" viewBox="0 0 16 16"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" /></symbol>
    <symbol id="quality" viewBox="0 0 16 16"><path d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z" /><path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z" /></symbol>
    <symbol id="navbar-icon" viewBox="0 0 16 16"><path d="M14 10.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 .5-.5zm0-3a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0 0 1h7a.5.5 0 0 0 .5-.5zm0-3a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0 0 1h11a.5.5 0 0 0 .5-.5z" /></symbol>
    <symbol id="facebook" viewBox="0 0 24 24"><path fill="currentColor" d="M9.198 21.5h4v-8.01h3.604l.396-3.98h-4V7.5a1 1 0 0 1 1-1h3v-4h-3a5 5 0 0 0-5 5v2.01h-2l-.396 3.98h2.396v8.01Z" /></symbol>
    <symbol id="instagram" viewBox="0 0 256 256"><path fill="currentColor" d="M128 80a48 48 0 1 0 48 48a48.05 48.05 0 0 0-48-48Zm0 80a32 32 0 1 1 32-32a32 32 0 0 1-32 32Zm48-136H80a56.06 56.06 0 0 0-56 56v96a56.06 56.06 0 0 0 56 56h96a56.06 56.06 0 0 0 56-56V80a56.06 56.06 0 0 0-56-56Zm40 152a40 40 0 0 1-40 40H80a40 40 0 0 1-40-40V80a40 40 0 0 1 40-40h96a40 40 0 0 1 40 40ZM192 76a12 12 0 1 1-12-12a12 12 0 0 1 12 12Z" /></symbol>
    <symbol id="twitter" viewBox="0 0 256 256"><path fill="currentColor" d="m245.66 77.66l-29.9 29.9C209.72 177.58 150.67 232 80 232c-14.52 0-26.49-2.3-35.58-6.84c-7.33-3.67-10.33-7.6-11.08-8.72a8 8 0 0 1 3.85-11.93c.26-.1 24.24-9.31 39.47-26.84a110.93 110.93 0 0 1-21.88-24.2c-12.4-18.41-26.28-50.39-22-98.18a8 8 0 0 1 13.65-4.92c.35.35 33.28 33.1 73.54 43.72V88a47.87 47.87 0 0 1 14.36-34.3A46.87 46.87 0 0 1 168.1 40a48.66 48.66 0 0 1 41.47 24H240a8 8 0 0 1 5.66 13.66Z" /></symbol>
    <symbol id="linkedin" viewBox="0 0 24 24"><path fill="currentColor" d="M6.94 5a2 2 0 1 1-4-.002a2 2 0 0 1 4 .002zM7 8.48H3V21h4V8.48zm6.32 0H9.34V21h3.94v-6.57c0-3.66 4.77-4 4.77 0V21H22v-7.93c0-6.17-7.06-5.94-8.72-2.91l.04-1.68z" /></symbol>
    <symbol id="youtube" viewBox="0 0 32 32"><path fill="currentColor" d="M29.41 9.26a3.5 3.5 0 0 0-2.47-2.47C24.76 6.2 16 6.2 16 6.2s-8.76 0-10.94.59a3.5 3.5 0 0 0-2.47 2.47A36.13 36.13 0 0 0 2 16a36.13 36.13 0 0 0 .59 6.74a3.5 3.5 0 0 0 2.47 2.47c2.18.59 10.94.59 10.94.59s8.76 0 10.94-.59a3.5 3.5 0 0 0 2.47-2.47A36.13 36.13 0 0 0 30 16a36.13 36.13 0 0 0-.59-6.74ZM13.2 20.2v-8.4l7.27 4.2Z" /></symbol>
  </svg>

</body>
</html>