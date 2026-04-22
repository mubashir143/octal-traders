<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login | Octal Traders</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
  <style>
    body { 
      font-family: 'Inter', sans-serif; 
      background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%); 
      min-height: 100vh; 
      display: flex; 
      align-items: center; 
      color: #fff;
    }
    .auth-card { 
      background: rgba(255,255,255,0.05); 
      backdrop-filter: blur(20px); 
      border: 1px solid rgba(255,255,255,0.1); 
      border-radius: 24px; 
      padding: 2.5rem; 
      box-shadow: 0 25px 50px rgba(0,0,0,0.4); 
    }
    .auth-card .form-control { 
      background: rgba(255,255,255,0.08); 
      border: 1px solid rgba(255,255,255,0.15); 
      color: #fff; 
      border-radius: 12px; 
      padding: 0.75rem 1rem; 
    }
    .auth-card .form-control::placeholder { 
      color: rgba(255,255,255,0.4); 
    }
    .auth-card .form-control:focus { 
      background: rgba(255,255,255,0.12); 
      border-color: #e66239; 
      box-shadow: 0 0 0 3px rgba(230,98,57,0.2); 
      color: #fff; 
    }
    .auth-card .form-label { 
      color: rgba(255,255,255,0.8); 
      font-weight: 500; 
      font-size: 0.875rem; 
    }
    .btn-auth { 
      background: linear-gradient(135deg, #e66239, #c0392b); 
      border: none; 
      border-radius: 12px; 
      padding: 0.8rem; 
      font-weight: 700; 
      letter-spacing: 0.5px; 
      transition: all 0.3s ease; 
      color: white;
    }
    .btn-auth:hover { 
      transform: translateY(-2px); 
      box-shadow: 0 10px 25px rgba(230,98,57,0.4); 
      color: white;
    }
    .auth-title { 
      color: #fff; 
      font-weight: 800; 
      font-size: 1.8rem; 
    }
    .auth-subtitle { 
      color: rgba(255,255,255,0.5); 
      font-size: 0.9rem; 
    }
    .logo-area img { 
      max-height: 60px; 
      background: white; 
      padding: 5px; 
      border-radius: 12px; 
    }
    .admin-badge {
      background: rgba(230, 98, 57, 0.2);
      color: #e66239;
      padding: 4px 12px;
      border-radius: 50px;
      font-size: 0.75rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 1px;
      display: inline-block;
      margin-bottom: 1rem;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-5 col-lg-4">
        <div class="text-center mb-4">
          <a href="{{ route('home') }}">
            <img src="{{ asset('images/main-logo.png') }}" class="logo-area" alt="Octal Traders">
          </a>
        </div>
        <div class="auth-card">
          <div class="text-center">
            <span class="admin-badge">Admin Portal</span>
            <h1 class="auth-title mb-1">Welcome Back</h1>
            <p class="auth-subtitle mb-4">Please enter your admin credentials</p>
          </div>

          @if($errors->any())
            <div class="alert alert-danger rounded-3 py-2 small mb-4">
              <i class="ti ti-alert-circle me-1"></i> {{ $errors->first() }}
            </div>
          @endif

          <form method="POST" action="{{ route('admin.login.post') }}">
            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <div class="input-group">
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="admin@octaltraders.com" required autofocus>
              </div>
            </div>
            <div class="mb-4">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="••••••••" required>
            </div>
            
            <button type="submit" class="btn btn-auth w-100">
              Access Dashboard <i class="ti ti-arrow-right ms-1"></i>
            </button>
          </form>

          <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="text-decoration-none small" style="color: rgba(255,255,255,0.5);">
              <i class="ti ti-arrow-left me-1"></i> Return to Storefront
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
