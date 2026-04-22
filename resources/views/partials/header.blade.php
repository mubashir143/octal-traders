<!-- Tabler Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<style>
  :root {
    --primary-color: #e66239;
    --primary-secondary: #f4805c;
    --dark-color: #0f172a;
    --header-height: 85px;
  }
  
  body { font-family: 'Plus Jakarta Sans', sans-serif; }

  .main-header {
    height: var(--header-height);
    display: flex;
    align-items: center;
    background: transparent;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border-bottom: 1px solid transparent;
  }

  /* Floating Style on Scroll */
  .main-header.scrolled {
    height: 70px;
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(15px) saturate(180%);
    -webkit-backdrop-filter: blur(15px) saturate(180%);
    margin: 15px 20px;
    width: calc(100% - 40px) !important;
    border-radius: 24px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 15px 35px rgba(0,0,0,0.06);
    top: 0;
  }

  @media (max-width: 991px) {
    .main-header {
      height: 70px !important;
      background: white !important;
      border-bottom: 1px solid #f1f5f9;
    }
    .main-header.scrolled {
      margin: 0 !important;
      width: 100% !important;
      border-radius: 0 !important;
      border: none !important;
      border-bottom: 1px solid #f1f5f9;
    }
    .nav-link-custom {
      padding: 12px 20px !important;
      margin: 4px 0;
      font-size: 1rem;
    }
    .navbar-collapse {
      position: absolute;
      top: 70px;
      left: 0;
      width: 100%;
      background: white;
      padding: 20px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.1);
      max-height: calc(100vh - 70px);
      overflow-y: auto;
    }
    .btn-premium {
      width: 100%;
      text-align: center;
    }
  }

  .nav-link-custom {
    color: var(--dark-color);
    font-weight: 600;
    font-size: 0.92rem;
    padding: 10px 18px !important;
    border-radius: 12px;
    transition: all 0.25s ease;
    margin: 0 4px;
  }

  .nav-link-custom:hover, .nav-link-custom.active {
    background: rgba(230, 98, 57, 0.08);
    color: var(--primary-color);
  }

  .btn-premium {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-secondary) 100%);
    color: white;
    border-radius: 16px;
    padding: 0.7rem 1.6rem;
    font-weight: 700;
    font-size: 0.88rem;
    letter-spacing: 0.5px;
    transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
    border: none;
    box-shadow: 0 4px 15px rgba(230, 98, 57, 0.25);
  }

  .btn-premium:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 8px 25px rgba(230, 98, 57, 0.4);
    color: white;
  }

  .cart-pill {
    background: #f1f5f9;
    padding: 10px 16px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    gap: 8px;
    color: var(--dark-color);
    text-decoration: none;
    transition: all 0.3s ease;
    border: 1px solid transparent;
  }

  .cart-pill:hover {
    background: white;
    border-color: #e2e8f0;
    transform: translateY(-2px);
    color: var(--primary-color);
  }

  .cart-count {
    background: var(--primary-color);
    color: white;
    font-size: 0.72rem;
    padding: 2px 7px;
    border-radius: 8px;
    font-weight: 800;
  }

  /* User Avatar */
  .avatar-wrap {
    width: 42px;
    height: 42px;
    background: #f1f5f9;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    cursor: pointer;
  }
  .avatar-wrap:hover {
    background: white;
    transform: rotate(5deg);
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
  }

  /* Dropdown refinement */
  .dropdown-menu-custom {
    border: none;
    box-shadow: 0 20px 50px rgba(0,0,0,0.1);
    border-radius: 20px;
    padding: 12px;
    margin-top: 15px;
  }
  .dropdown-item-custom {
    padding: 10px 15px;
    border-radius: 12px;
    font-weight: 500;
    transition: all 0.2s ease;
  }
  .dropdown-item-custom:hover {
    background: #f8fafc;
    color: var(--primary-color);
    padding-left: 20px;
  }

  /* Animations */
  @keyframes slideIn {
    0% { opacity: 0; transform: translateY(10px); }
    100% { opacity: 1; transform: translateY(0); }
  }
  .animate.slideIn { animation: slideIn 0.3s ease-out forwards; }
</style>

<header id="header" class="main-header fixed-top w-100">
  <nav class="navbar navbar-expand-lg w-100 py-0">
    <div class="container">
      <!-- Logo -->
      <a class="navbar-brand me-4 d-flex align-items-center" href="{{ route('home') }}">
        <img src="{{ asset('images/main-logo.png') }}" alt="Octal Traders" style="max-height: 55px; transition: all 0.3s ease; mix-blend-mode: multiply;">
      </a>

      <!-- Mobile Toggle -->
      <button class="navbar-toggler border-0 p-2 shadow-none rounded-3 bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
        <i class="ti ti-menu-2 fs-3 text-dark"></i>
      </button>

      <!-- Navigation Central -->
      <div class="collapse navbar-collapse" id="mainNavbar">
        <ul class="navbar-nav mx-auto bg-white bg-lg-transparent rounded-4 p-3 p-lg-0 mt-3 mt-lg-0 shadow-sm shadow-lg-none">
          <li class="nav-item">
            <a class="nav-link nav-link-custom {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-custom {{ (request()->routeIs('shop') && !request('filter') && !request('category')) ? 'active' : '' }}" href="{{ route('shop') }}">Shop</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link nav-link-custom dropdown-toggle shadow-none {{ request('category') ? 'active' : '' }}" href="#" id="categoryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categories
            </a>
            <ul class="dropdown-menu dropdown-menu-custom animate slideIn" aria-labelledby="categoryDropdown">
              @foreach($headerCategories as $cat)
                <li><a class="dropdown-item dropdown-item-custom {{ request('category') == $cat->slug ? 'active' : '' }}" href="{{ route('shop', ['category' => $cat->slug]) }}">{{ $cat->name }}</a></li>
              @endforeach
              <li><hr class="dropdown-divider mx-2 opacity-5"></li>
              <li><a class="dropdown-item dropdown-item-custom" href="{{ route('shop') }}">View All</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-custom {{ request('filter') == 'deals' ? 'active' : '' }}" href="{{ route('shop', ['filter' => 'deals']) }}">Deals</a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-custom" href="#footer">Contact</a>
          </li>
        </ul>

        <!-- Right Side Items -->
        <div class="d-flex align-items-center gap-3 mt-3 mt-lg-0 ms-lg-3">
          <!-- Search Toggle -->
          <div class="avatar-wrap search-trigger" data-bs-toggle="modal" data-bs-target="#searchModal">
            <i class="ti ti-search fs-5 text-muted"></i>
          </div>

          <!-- Cart Pill -->
          <a href="{{ route('cart.index') }}" class="cart-pill">
            <i class="ti ti-shopping-cart fs-5"></i>
            @if(session('cart') && count(session('cart')) > 0)
              <span class="cart-count">{{ count(session('cart')) }}</span>
            @endif
          </a>

          <!-- User Section -->
          @auth
            <div class="dropdown">
              <div class="avatar-wrap" data-bs-toggle="dropdown">
                <i class="ti ti-user-circle fs-3 text-muted"></i>
              </div>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-custom border-0 animate slideIn">
                <li class="px-3 py-2 border-bottom mb-2">
                   <p class="mb-0 fw-bold small text-dark">{{ auth()->user()->name }}</p>
                   <p class="mb-0 text-muted" style="font-size: 0.75rem;">{{ auth()->user()->email }}</p>
                </li>
                @if(auth()->user()->role === 'admin')
                  <li><a class="dropdown-item dropdown-item-custom mb-1" href="{{ route('admin.dashboard') }}"><i class="ti ti-layout-dashboard me-2"></i>Dashboard</a></li>
                @endif
                <li><a class="dropdown-item dropdown-item-custom mb-1" href="#"><i class="ti ti-settings me-2"></i>Settings</a></li>
                <li><hr class="dropdown-divider mx-2"></li>
                <li>
                  <form method="POST" action="{{ route('logout') }}" class="m-0">
                    @csrf
                    <button type="submit" class="dropdown-item dropdown-item-custom text-danger"><i class="ti ti-logout me-2"></i>Log Out</button>
                  </form>
                </li>
              </ul>
            </div>
          @else
            <div class="d-flex align-items-center gap-2">
              <a href="{{ route('login') }}" class="btn btn-link text-dark text-decoration-none fw-bold small pe-3 d-none d-md-block">Sign In</a>
              <a href="{{ route('register') }}" class="btn btn-premium">Get Started</a>
            </div>
          @endauth
        </div>
      </div>
    </div>
  </nav>
</header>

<!-- Search Modal -->
<div class="modal fade modal-fullscreen" id="searchModal" tabindex="-1">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content" style="background: rgba(15, 23, 42, 0.98); backdrop-filter: blur(20px);">
      <div class="modal-body d-flex align-items-center justify-content-center">
        <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-5" data-bs-dismiss="modal" aria-label="Close" style="width: 40px; height: 40px;"></button>
        <div class="container text-center">
          <form action="{{ route('shop') }}" method="GET" class="w-100 mx-auto" style="max-width: 800px;">
            <p class="text-uppercase text-primary fw-bold tracking-widest mb-4">What are you looking for?</p>
            <div class="position-relative">
              <input type="text" name="search" class="form-control bg-transparent border-0 border-bottom border-secondary text-white fs-1 text-center py-4 shadow-none" placeholder="Type here..." autofocus>
              <button type="submit" class="position-absolute end-0 top-50 translate-middle-y border-0 bg-transparent text-white opacity-50 hover-opacity-100 transition">
                <i class="ti ti-arrow-right fs-1"></i>
              </button>
            </div>
            <div class="mt-5 d-flex gap-3 justify-content-center flex-wrap">
              <span class="text-muted">Popular:</span>
              <a href="{{ route('shop', ['category' => 'headphones']) }}" class="text-light text-decoration-none hover-text-primary px-3 py-1 rounded-pill border border-secondary border-opacity-25 transition">Headphones</a>
              <a href="{{ route('shop', ['category' => 'speakers']) }}" class="text-light text-decoration-none hover-text-primary px-3 py-1 rounded-pill border border-secondary border-opacity-25 transition">Speakers</a>
              <a href="{{ route('shop', ['category' => 'smart-watches']) }}" class="text-light text-decoration-none hover-text-primary px-3 py-1 rounded-pill border border-secondary border-opacity-25 transition">Watches</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  window.addEventListener('scroll', function() {
    const header = document.getElementById('header');
    if (window.scrollY > 20) {
      header.classList.add('scrolled');
    } else {
      header.classList.remove('scrolled');
    }
  });
</script>
