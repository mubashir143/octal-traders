<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register | Octal Traders</title>
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
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5 col-lg-4">
        <div class="text-center mb-4">
          <a href="{{ route('home') }}">
            <img src="{{ asset('images/main-logo.png') }}" alt="Octal Traders" style="max-height:50px; background: white; padding: 5px; border-radius: 10px;">
          </a>
        </div>
        <div class="auth-card">
          <h1 class="auth-title mb-1">Create account</h1>
          <p class="auth-subtitle mb-4">Join Octal Traders today</p>

          @if($errors->any())
            <div class="alert alert-danger rounded-3 py-2">
              <ul class="mb-0 ps-3">
                @foreach($errors->all() as $error)
                  <li style="font-size:0.85rem;">{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="John Doe" required autofocus>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="you@example.com" required>
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Min. 8 characters" required>
            </div>
            <div class="mb-4">
              <label for="password_confirmation" class="form-label">Confirm Password</label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Repeat password" required>
            </div>
            <button type="submit" class="btn btn-auth btn-danger w-100 text-white">Create Account</button>
          </form>

          <p class="text-center mt-4 mb-0" style="color: rgba(255,255,255,0.5); font-size:0.875rem;">
            Already have an account? <a href="{{ route('login') }}" class="auth-link">Sign in</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
