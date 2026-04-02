<style>
  .glass-header {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      border-bottom: 1px solid rgba(0,0,0,0.05);
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.03);
  }
  .glass-header .nav-link { font-weight: 500; transition: color 0.2s ease, transform 0.2s ease; }
  .glass-header .nav-link:hover { color: var(--primary-color); transform: translateY(-1px); }
  .cart-badge-bounce { animation: bounce 2s infinite; }
  @keyframes bounce { 0%, 100% { transform: translateY(0) translateX(-50%); } 50% { transform: translateY(-3px) translateX(-50%); } }
</style>
<header id="header" class="site-header position-fixed w-100 glass-header" style="top:0; z-index:9999;">
    <nav id="header-nav" class="navbar navbar-expand-lg px-4 py-2 mb-0">
      <div class="container-fluid">
        <a class="navbar-brand pe-4" href="{{ route('home') }}">
          <img src="{{ asset('images/main-logo.png') }}" class="logo py-1" style="max-height: 45px; mix-blend-mode: multiply;">
        </a>
        <button class="navbar-toggler d-flex d-lg-none order-3 p-2" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
          <svg class="navbar-icon" width="20" height="20">
            <use xlink:href="#navbar-icon"></use>
          </svg>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel">
          <div class="offcanvas-header px-4 pb-0">
            <a class="navbar-brand" href="{{ route('home') }}">
              <img src="{{ asset('images/main-logo.png') }}" class="logo" style="max-height: 40px; mix-blend-mode: multiply;">
            </a>
            <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas" aria-label="Close"
              data-bs-target="#bdNavbar"></button>
          </div>
          <div class="offcanvas-body align-items-center">
            
            <!-- Left Aligned Navigation (Next to Logo) -->
            <ul id="navbar" class="navbar-nav text-uppercase align-items-lg-center me-auto pe-3">
              <li class="nav-item">
                <a class="nav-link me-4 {{ request()->routeIs('home') ? 'active text-primary' : '' }}" href="{{ route('home') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-4 {{ request()->routeIs('shop') ? 'active text-primary' : '' }}" href="{{ route('shop') }}">Shop</a>
              </li>
            </ul>

            <!-- Right Aligned User Items (Cart, Dashboard) -->
            <div class="user-items mt-3 mt-lg-0 pe-lg-3">
              <ul class="d-flex list-unstyled mb-0 align-items-center">
                <li class="pe-4">
                  <a href="{{ route('cart.index') }}" class="position-relative text-dark">
                    <svg class="cart" width="24" height="24">
                      <use xlink:href="#cart"></use>
                    </svg>
                    @if(session('cart') && count(session('cart')) > 0)
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cart-badge-bounce" style="font-size: 0.65rem; padding: 0.35em 0.6em; border: 2px solid #fff;">
                      {{ count(session('cart')) }}
                    </span>
                    @endif
                  </a>
                </li>
                @auth
                  @if(auth()->user()->role === 'admin')
                  <li class="me-2">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-dark rounded-pill fw-bold text-uppercase" style="font-size: 0.8rem; padding: 0.4rem 1.2rem;">Dashboard</a>
                  </li>
                  @endif
                  <li class="d-flex align-items-center gap-2">
                    <span class="fw-semibold text-dark" style="font-size: 0.85rem;">Hi, {{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="mb-0">
                      @csrf
                      <button type="submit" class="btn btn-danger rounded-pill fw-bold text-uppercase" style="font-size: 0.8rem; padding: 0.4rem 1.2rem;">Logout</button>
                    </form>
                  </li>
                @else
                  <li class="me-2">
                    <a href="{{ route('login') }}" class="btn btn-outline-dark rounded-pill fw-bold text-uppercase" style="font-size: 0.8rem; padding: 0.4rem 1.2rem;">Login</a>
                  </li>
                  <li>
                    <a href="{{ route('register') }}" class="btn btn-dark rounded-pill fw-bold text-uppercase" style="font-size: 0.8rem; padding: 0.4rem 1.2rem;">Register</a>
                  </li>
                @endauth
              </ul>
            </div>
            
          </div>
        </div>
      </div>
    </nav>
</header>
