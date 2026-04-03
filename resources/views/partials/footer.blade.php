<style>
  .premium-footer {
    background: linear-gradient(135deg, var(--dark-color) 0%, rgba(36,33,59,1) 100%);
    color: rgba(255, 255, 255, 0.7);
    border-top: 4px solid var(--primary-color);
  }
  .premium-footer .widget-title {
    color: #fff;
    font-weight: 600;
    letter-spacing: 1px;
    margin-bottom: 1.5rem;
  }
  .premium-footer a {
    color: rgba(255,255,255,0.7);
    transition: color 0.3s ease, padding-left 0.3s ease;
  }
  .premium-footer a:hover {
    color: var(--primary-color);
    text-decoration: none;
  }
  .premium-footer .menu-list a:hover {
    padding-left: 8px; /* micro interaction for links */
  }
  .premium-footer .social-links a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(255,255,255,0.05);
    margin-right: 10px;
    transition: all 0.3s ease;
  }
  .premium-footer .social-links a:hover {
    background: var(--primary-color);
    color: #fff;
    transform: translateY(-3px);
  }
  .premium-footer .social-links svg {
    fill: currentColor;
  }
  .footer-bottom {
    background: rgba(0,0,0,0.2) !important;
    padding: 20px 0;
    color: rgba(255,255,255,0.5);
    font-size: 0.9em;
  }
  .premium-footer .card-wrap img {
    height: 25px;
    border-radius: 4px;
    margin-right: 5px;
    opacity: 0.8;
    transition: opacity 0.2s ease;
  }
  .premium-footer .card-wrap img:hover {
    opacity: 1;
  }
</style>

<style>
  .modern-footer {
    background: #0f172a;
    color: #94a3b8;
    padding-top: 60px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 0.9rem;
  }
  
  .footer-newsletter {
    background: rgba(255,255,255,0.02);
    border: 1px solid rgba(255,255,255,0.05);
    border-radius: 20px;
    padding: 30px;
    margin-bottom: 50px;
  }
  
  .footer-title {
    color: #ffffff;
    font-weight: 700;
    font-size: 1.05rem;
    margin-bottom: 1.2rem;
  }
  
  .footer-link {
    color: #94a3b8;
    text-decoration: none;
    transition: all 0.2s ease;
    display: block;
    margin-bottom: 0.6rem;
  }
  
  .footer-link:hover {
    color: var(--primary-color);
    transform: translateX(3px);
  }
  
  .social-pill {
    width: 36px;
    height: 36px;
    background: rgba(255,255,255,0.05);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    color: white;
    margin-right: 8px;
    transition: all 0.3s ease;
  }
  
  .social-pill:hover {
    background: var(--primary-color);
    transform: translateY(-3px);
    color: white;
  }
  
  .newsletter-input-sm {
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 12px;
    padding: 10px 15px;
    color: white;
    font-size: 0.85rem;
  }
  
  .footer-bottom-v3 {
    border-top: 1px solid rgba(255,255,255,0.05);
    padding: 25px 0;
    margin-top: 50px;
    background: rgba(0,0,0,0.1);
  }

  .contact-box {
    font-size: 0.85rem;
    line-height: 1.6;
  }
</style>

<footer class="modern-footer mt-5">
  <div class="container">
    <!-- Compact Newsletter -->
    <div class="footer-newsletter">
      <div class="row align-items-center">
        <div class="col-lg-5 mb-3 mb-lg-0 text-center text-lg-start">
          <h4 class="text-white fw-700 mb-1">Octal Traders Insights</h4>
          <p class="mb-0 small text-muted">Join 5,000+ traders for weekly hardware updates.</p>
        </div>
        <div class="col-lg-7">
          <div class="d-flex gap-2">
            <input type="email" class="form-control newsletter-input-sm shadow-none" placeholder="Enter your email...">
            <button class="btn btn-premium py-2 px-4" style="font-size: 0.85rem;">Join now</button>
          </div>
        </div>
      </div>
    </div>

    <div class="row g-4">
      <!-- Brand -->
      <div class="col-lg-4 col-md-12">
        <div class="d-flex align-items-center gap-2 mb-3">
          <img src="{{ asset('images/main-logo.png') }}" alt="Octal Traders" class="img-fluid" style="max-height: 55px; filter: brightness(0) invert(1); display: block !important; opacity: 1 !important;">
        </div>
        <p class="mb-4 small lh-base pe-lg-4">Premium hardware and professional trading solutions. Octal Traders is your trusted partner in high-performance technology.</p>
        <div class="social-links">
          <a href="#" class="social-pill"><i class="ti ti-brand-facebook fs-5"></i></a>
          <a href="#" class="social-pill"><i class="ti ti-brand-linkedin fs-5"></i></a>
          <a href="#" class="social-pill"><i class="ti ti-brand-x fs-5"></i></a>
        </div>
      </div>

      <!-- Links -->
      <div class="col-6 col-lg-2">
        <h6 class="footer-title">Navigation</h6>
        <a href="{{ route('home') }}" class="footer-link small">Home</a>
        <a href="{{ route('shop') }}" class="footer-link small">Marketplace</a>
        <a href="{{ route('cart.index') }}" class="footer-link small">Cart</a>
        <a href="{{ route('checkout') }}" class="footer-link small">Checkout</a>
      </div>

      <!-- Services -->
      <div class="col-6 col-lg-2">
        <h6 class="footer-title">Our Services</h6>
        <a href="#" class="footer-link small">Fast Shipping</a>
        <a href="#" class="footer-link small">24/7 Support</a>
        <a href="#" class="footer-link small">Secured Payments</a>
        <a href="#" class="footer-link small">Custom Builds</a>
      </div>

      <!-- Contact -->
      <div class="col-lg-4">
        <h6 class="footer-title">Get in Touch</h6>
        <div class="contact-box">
          <div class="d-flex gap-2 mb-2">
            <i class="ti ti-map-pin text-primary mt-1"></i>
            <span>123 Tech Avenue, Silicon District, NY</span>
          </div>
          <div class="d-flex gap-2 mb-2">
            <i class="ti ti-mail text-primary mt-1"></i>
            <a href="mailto:contact@octaltraders.com" class="text-reset text-decoration-none">contact@octaltraders.com</a>
          </div>
          <div class="d-flex gap-2">
            <i class="ti ti-phone text-primary mt-1"></i>
            <span>+1 (234) 567-890</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Minimal Bottom -->
  <div class="footer-bottom-v3">
    <div class="container">
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2 small">
        <p class="mb-0">&copy; {{ date('Y') }} <strong>Octal Traders</strong>. All rights reserved.</p>
        <div class="d-flex gap-3">
          <a href="#" class="text-reset text-decoration-none opacity-50 hover-opacity-100">Privacy</a>
          <a href="#" class="text-reset text-decoration-none opacity-50 hover-opacity-100">Terms</a>
          <a href="#" class="text-reset text-decoration-none opacity-50 hover-opacity-100">Cookies</a>
        </div>
      </div>
    </div>
  </div>
</footer>

<script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
