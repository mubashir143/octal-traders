<header id="header" class="site-header header-scrolled position-fixed text-black bg-light w-100" style="top:0; z-index:9999;">
    <nav id="header-nav" class="navbar navbar-expand-lg px-3 mb-3">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="{{ asset('images/main-logo.png') }}" class="logo">
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
              <img src="{{ asset('images/main-logo.png') }}" class="logo">
            </a>
            <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas" aria-label="Close"
              data-bs-target="#bdNavbar"></button>
          </div>
          <div class="offcanvas-body">
            <ul id="navbar" class="navbar-nav text-uppercase justify-content-end align-items-center flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link me-4 {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-4 {{ request()->routeIs('shop') ? 'active' : '' }}" href="{{ route('shop') }}">Shop</a>
              </li>
              <li class="nav-item">
                <div class="user-items ps-5">
                  <ul class="d-flex justify-content-end list-unstyled mb-0">
                    <li class="pe-3">
                      <a href="{{ route('cart.index') }}" class="position-relative">
                        <svg class="cart" width="24" height="24">
                          <use xlink:href="#cart"></use>
                        </svg>
                        @if(session('cart') && count(session('cart')) > 0)
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.6rem;">
                          {{ count(session('cart')) }}
                        </span>
                        @endif
                      </a>
                    </li>
                    @auth
                    <li class="pe-3">
                        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    @else
                    <li class="pe-3">
                        <a href="{{ route('admin.dashboard') }}">Login</a>
                    </li>
                    @endauth
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
</header>
