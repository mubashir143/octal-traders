<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>@yield('title', 'Admin Dashboard') | {{ config('app.name', 'InApp') }}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('admin-assets/images/favicon_io/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('admin-assets/images/favicon_io/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin-assets/images/favicon_io/favicon-16x16.png') }}">
  
  @vite(['resources/admin/js/main.js'])
  @stack('styles')
</head>

<body>
  <div id="overlay" class="overlay"></div>
  <!-- TOPBAR -->
  <nav id="topbar" class="navbar bg-white border-bottom fixed-top topbar px-3">
    <button id="toggleBtn" class="d-none d-lg-inline-flex btn btn-light btn-icon btn-sm ">
      <i class="ti ti-layout-sidebar-left-expand"></i>
    </button>

    <!-- MOBILE -->
    <button id="mobileBtn" class="btn btn-light btn-icon btn-sm d-lg-none me-2">
      <i class="ti ti-layout-sidebar-left-expand"></i>
    </button>
    <div>
        <ul class="list-unstyled d-flex align-items-center mb-0 gap-1">
        <li class="ms-3 dropdown">
          <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" class="d-flex align-items-center gap-2 text-decoration-none">
            <img src="{{ asset('admin-assets/images/avatar/avatar-1.jpg') }}" alt="" class="avatar avatar-sm rounded-circle" />
            <span class="d-none d-md-inline small fw-semibold">{{ auth()->user()->name ?? 'Admin' }}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-end p-0" style="min-width: 200px;">
            <div class="d-flex gap-3 align-items-center border-bottom px-3 py-3">
              <img src="{{ asset('admin-assets/images/avatar/avatar-1.jpg') }}" alt="" class="avatar avatar-md rounded-circle" />
              <div>
                <h4 class="mb-0 small">{{ auth()->user()->name ?? 'Admin' }}</h4>
                <p class="mb-0 small text-muted">{{ auth()->user()->email ?? '' }}</p>
              </div>
            </div>
            <div class="p-2">
              <a href="{{ route('home') }}" class="dropdown-item rounded">View Site</a>
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item rounded text-danger">Logout</button>
              </form>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <!-- SIDEBAR -->
  <aside id="sidebar" class="sidebar">
    <div class="logo-area">
      <a href="{{ route('admin.dashboard') }}" class="d-inline-flex align-items-center">
        <span class="logo-text ms-2"> <img src="{{ asset('images/main-logo.png') }}" alt="Octal Traders" style="max-height: 55px; mix-blend-mode: multiply;"></span>
      </a>
    </div>
    <ul class="nav flex-column">
      <li class="px-4 py-2"><small class="nav-text">Main</small></li>
      <li><a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><i class="ti ti-home"></i><span class="nav-text">Dashboard</span></a></li>
      <li><a class="nav-link {{ request()->routeIs('admin.inventory') ? 'active' : '' }}" href="{{ route('admin.inventory') }}"><i class="ti ti-box-seam"></i><span class="nav-text">Inventory</span></a></li>
      <li><a class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}"><i class="ti ti-tags"></i><span class="nav-text">Categories</span></a></li>
      <li><a class="nav-link {{ request()->routeIs('admin.products.create') ? 'active' : '' }}" href="{{ route('admin.products.create') }}"><i class="ti ti-plus"></i><span class="nav-text">Add Product</span></a></li>
      <li class="px-4 py-2 mt-3"><small class="nav-text">Management</small></li>
      <li><a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}"><i class="ti ti-users"></i><span class="nav-text">Users</span></a></li>
      <li class="px-4 py-2 mt-3"><small class="nav-text">Sales</small></li>
      <li><a class="nav-link {{ request()->routeIs('admin.orders.*') ? 'active' : '' }}" href="{{ route('admin.orders.index') }}"><i class="ti ti-shopping-cart"></i><span class="nav-text">Orders</span></a></li>
    </ul>
  </aside>

  <!-- MAIN CONTENT -->
  <main id="content" class="content py-10">
    <div class="container-fluid">
      @yield('content')
    </div>
  </main>

  @stack('scripts')
</body>
</html>
