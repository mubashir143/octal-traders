<style>
  .glass-header {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border-bottom: 1px solid rgba(0,0,0,0.08);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
  }
  .glass-header .nav-link { 
      font-weight: 600; 
      letter-spacing: 0.5px;
      color: var(--dark-color);
      transition: color 0.3s ease, padding-left 0.3s ease; 
      position: relative;
  }
  .glass-header .nav-link::after {
      content: '';
      position: absolute;
      width: 0; height: 2px;
      bottom: 0; left: 50%;
      background-color: var(--primary-color);
      transition: all 0.3s ease;
      transform: translateX(-50%);
  }
  .glass-header .nav-link:hover::after, .glass-header .nav-link.active::after {
      width: 100%;
  }
  .glass-header .nav-link:hover, .glass-header .nav-link.active { 
      color: var(--primary-color) !important; 
  }
  
  .glass-btn {
      border: 1px solid rgba(0,0,0,0.1);
      border-radius: 50px;
      padding: 0.5rem 1.25rem;
      font-weight: 600;
      color: var(--dark-color);
      transition: all 0.3s ease;
  }
  .glass-btn:hover {
      background: var(--dark-color);
      color: #fff !important;
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
  }

  .cart-badge-bounce { animation: bounce 2s infinite; }
  @keyframes bounce { 
      0%, 100% { transform: translateY(0) translateX(-50%); } 
      50% { transform: translateY(-4px) translateX(-50%); } 
  }
</style>
<header id="header" class="site-header position-fixed w-100 glass-header" style="top:0; z-index:9999;">
    <nav class="navbar navbar-expand-lg px-4 py-2 mb-0">
      <div class="container-fluid align-items-center">
        <!-- Logo -->
        <a class="navbar-brand me-4 pe-4 border-end" href="{{ route('home') }}">
          <img src="{{ asset('images/main-logo.png') }}" class="logo py-1" style="max-height: 48px; mix-blend-mode: multiply;">
        </a>

        <!-- Desktop Navigation (Next to Logo) -->
        <div class="collapse navbar-collapse d-none d-lg-block" id="desktopNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-uppercase d-flex gap-2">
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('shop') ? 'active' : '' }}" href="{{ route('shop') }}">Shop</a>
                </li>
            </ul>
        </div>
        
        <!-- Right Side Icons & CTA -->
        <div class="d-flex align-items-center justify-content-end gap-4 ms-auto">
            <a href="{{ route('cart.index') }}" class="position-relative text-dark text-decoration-none">
                <svg class="cart" width="26" height="26" style="transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'">
                    <use xlink:href="#cart"></use>
                </svg>
                @if(session('cart') && count(session('cart')) > 0)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cart-badge-bounce shadow-sm" style="font-size: 0.70rem; padding: 0.35em 0.65em; border: 2px solid #fff;">
                    {{ count(session('cart')) }}
                </span>
                @endif
            </a>

            @auth
            <a href="{{ route('admin.dashboard') }}" class="glass-btn text-decoration-none text-uppercase small d-none d-lg-inline-block">Dashboard <i class="ti ti-arrow-right ms-1"></i></a>
            @else
            <a href="{{ route('admin.dashboard') }}" class="glass-btn text-decoration-none text-uppercase small d-none d-lg-inline-block">Login</a>
            @endauth

            <!-- Mobile Toggle -->
            <button class="navbar-toggler border-0 p-1 shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <svg class="navbar-icon" width="28" height="28" style="stroke: var(--dark-color); fill: none; stroke-width: 2px;">
                    <use xlink:href="#navbar-icon"></use>
                </svg>
            </button>
        </div>

        <!-- Mobile Offcanvas Menu -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel" style="background: rgba(255,255,255,0.95); backdrop-filter: blur(15px);">
          <div class="offcanvas-header px-4 py-3 border-bottom">
            <a class="navbar-brand" href="{{ route('home') }}">
              <img src="{{ asset('images/main-logo.png') }}" class="logo py-1" style="max-height: 40px; mix-blend-mode: multiply;">
            </a>
            <button type="button" class="btn-close btn-close-dark shadow-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body p-4">
            <ul class="navbar-nav text-uppercase d-flex flex-column gap-3 mb-4">
              <li class="nav-item">
                <a class="nav-link fs-4 {{ request()->routeIs('home') ? 'active text-primary' : 'text-dark' }}" href="{{ route('home') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link fs-4 {{ request()->routeIs('shop') ? 'active text-primary' : 'text-dark' }}" href="{{ route('shop') }}">Shop</a>
              </li>
            </ul>
            
            <div class="mt-auto pt-4 border-top">
                @auth
                <a href="{{ route('admin.dashboard') }}" class="btn btn-dark w-100 py-3 text-uppercase fw-bold rounded-pill">Admin Dashboard</a>
                @else
                <a href="{{ route('admin.dashboard') }}" class="btn btn-dark w-100 py-3 text-uppercase fw-bold rounded-pill">Account Login</a>
                @endauth
            </div>
          </div>
        </div>
      </div>
    </nav>
</header>
