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

<footer id="footer" class="premium-footer overflow-hidden padding-large py-5">
    <div class="container">
      <div class="row pt-5 pb-4">
        <div class="footer-top-area w-100">
          <div class="row d-flex flex-wrap justify-content-between">
            <div class="col-lg-4 col-sm-6 pb-4 pe-lg-5">
              <div class="footer-menu">
                <a href="{{ route('home') }}">
                  <img src="{{ asset('images/main-logo.png') }}" class="logo mb-4" alt="logo" style="mix-blend-mode: color-dodge; opacity: 0.9; max-height: 55px; filter: brightness(0) invert(1);">
                </a>
                <p class="mb-4">Leading provider of octal-based trading solutions, ensuring reliable and secure transactions for global markets with a premium experience.</p>
                <div class="social-links">
                  <ul class="d-flex list-unstyled">
                    <li><a href="#"><svg class="facebook" width="18" height="18"><use xlink:href="#facebook" /></svg></a></li>
                    <li><a href="#"><svg class="instagram" width="18" height="18"><use xlink:href="#instagram" /></svg></a></li>
                    <li><a href="#"><svg class="twitter" width="18" height="18"><use xlink:href="#twitter" /></svg></a></li>
                    <li><a href="#"><svg class="linkedin" width="18" height="18"><use xlink:href="#linkedin" /></svg></a></li>
                    <li><a href="#"><svg class="youtube" width="18" height="18"><use xlink:href="#youtube" /></svg></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-sm-6 pb-4">
              <div class="footer-menu">
                <h5 class="widget-title text-uppercase">Quick Links</h5>
                <ul class="menu-list list-unstyled">
                  <li class="menu-item pb-2"><a href="{{ route('home') }}">Home Screen</a></li>
                  <li class="menu-item pb-2"><a href="{{ route('shop') }}">Shop Catalog</a></li>
                  <li class="menu-item pb-2"><a href="{{ route('cart.index') }}">Your Cart</a></li>
                  <li class="menu-item pb-2"><a href="{{ route('checkout') }}">Checkout Page</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 pb-4">
              <div class="footer-menu">
                <h5 class="widget-title text-uppercase">Help & Info</h5>
                <ul class="menu-list list-unstyled">
                  <li class="menu-item pb-2"><a href="#">Track Your Order</a></li>
                  <li class="menu-item pb-2"><a href="#">Returns & Exchanges</a></li>
                  <li class="menu-item pb-2"><a href="#">Shipping & Delivery</a></li>
                  <li class="menu-item pb-2"><a href="#">Contact Us</a></li>
                  <li class="menu-item pb-2"><a href="#">Store Locations</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 pb-4">
              <div class="footer-menu contact-item">
                <h5 class="widget-title text-uppercase">Contact Us</h5>
                <p class="mb-2">Any queries or suggestions?</p>
                <a href="mailto:contact@octaltraders.com" class="d-block fw-bold text-white mb-3">contact@octaltraders.com</a>
                <p class="mb-2">Need immediate support?</p>
                <a href="tel:+1234567890" class="d-block fw-bold text-white fs-5">+1 234 567 890</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div id="footer-bottom" class="footer-bottom border-0 mt-3">
      <div class="container">
        <div class="row d-flex flex-wrap justify-content-between align-items-center">
          <div class="col-md-4 col-sm-6 mb-3 mb-md-0">
            <div class="Shipping d-flex align-items-center">
              <p class="mb-0 me-3">We ship with:</p>
              <div class="card-wrap d-flex align-items-center">
                <img src="{{ asset('images/dhl.png') }}" alt="dhl" class="bg-white p-1">
                <img src="{{ asset('images/shippingcard.png') }}" alt="shipping" class="bg-white p-1">
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 text-center text-md-end order-md-3">
            <div class="Payment-methods d-flex align-items-center justify-content-md-end">
              <p class="mb-0 me-3">Payment methods:</p>
              <div class="card-wrap d-flex align-items-center">
                <img src="{{ asset('images/visa.jpg') }}" alt="visa" class="bg-white p-1">
                <img src="{{ asset('images/mastercard.jpg') }}" alt="mastercard" class="bg-white p-1">
                <img src="{{ asset('images/paypal.jpg') }}" alt="paypal" class="bg-white p-1">
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-12 text-center order-md-2 mt-3 mt-md-0">
            <div class="copyright">
              <p class="mb-0">&copy; {{ date('Y') }} Octal Traders. All rights reserved.</p>
            </div>
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
