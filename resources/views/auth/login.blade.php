<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Octal Traders</title>
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <style>
    body { font-family: 'Inter', sans-serif; background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%); min-height: 100vh; display: flex; align-items: center; }
    .auth-card { background: rgba(255,255,255,0.05); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.1); border-radius: 24px; padding: 2.5rem; box-shadow: 0 25px 50px rgba(0,0,0,0.4); }
    .auth-card .form-control { background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15); color: #fff; border-radius: 12px; padding: 0.75rem 1rem; }
    .auth-card .form-control::placeholder { color: rgba(255,255,255,0.4); }
    .auth-card .form-control:focus { background: rgba(255,255,255,0.12); border-color: #e66239; box-shadow: 0 0 0 3px rgba(230,98,57,0.2); color: #fff; }
    .auth-card .form-label { color: rgba(255,255,255,0.8); font-weight: 500; font-size: 0.875rem; }
    .btn-auth { background: linear-gradient(135deg, #e66239, #c0392b); border: none; border-radius: 12px; padding: 0.8rem; font-weight: 700; letter-spacing: 0.5px; transition: all 0.3s ease; }
    .btn-auth:hover { transform: translateY(-2px); box-shadow: 0 10px 25px rgba(230,98,57,0.4); }
    .auth-title { color: #fff; font-weight: 800; font-size: 1.8rem; }
    .auth-subtitle { color: rgba(255,255,255,0.5); font-size: 0.9rem; }
    .auth-link { color: #e66239; text-decoration: none; font-weight: 600; }
    .auth-link:hover { color: #f07c52; }
    .logo-area img { max-height: 50px; filter: brightness(0) invert(1); }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5 col-lg-4">
        <div class="text-center mb-4">
          <a href="{{ route('home') }}">
            <img src="{{ asset('images/main-logo.png') }}" class="logo-area" alt="Octal Traders" style="max-height:50px; filter: brightness(0) invert(1);">
          </a>
        </div>
        <div class="auth-card">
          <h1 class="auth-title mb-1">Welcome back</h1>
          <p class="auth-subtitle mb-4">Sign in to your account to continue</p>

          @if($errors->any())
            <div class="alert alert-danger rounded-3 py-2">
              {{ $errors->first() }}
            </div>
          @endif

          <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required autofocus>
            </div>
            <div class="mb-4">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn btn-auth btn-danger w-100 text-white">Sign In</button>
          </form>

          <p class="text-center mt-4 mb-0" style="color: rgba(255,255,255,0.5); font-size:0.875rem;">
            Don't have an account? <a href="{{ route('register') }}" class="auth-link">Register here</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
