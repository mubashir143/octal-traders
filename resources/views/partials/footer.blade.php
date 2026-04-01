<footer id="footer" class="overflow-hidden padding-large">
    <div class="container">
      <div class="row">
        <div class="footer-top-area">
          <div class="row d-flex flex-wrap justify-content-between">
            <div class="col-lg-3 col-sm-6 pb-3">
              <div class="footer-menu">
                <img src="{{ asset('images/main-logo.png') }}" class="logo" alt="logo">
                <p>Leading provider of octal-based trading solutions, ensuring reliable and secure transactions for global markets.</p>
                <div class="social-links">
                  <ul class="d-flex list-unstyled">
                    <li><a href="#"><svg class="facebook" width="20" height="20"><use xlink:href="#facebook" /></svg></a></li>
                    <li><a href="#"><svg class="instagram" width="20" height="20"><use xlink:href="#instagram" /></svg></a></li>
                    <li><a href="#"><svg class="twitter" width="20" height="20"><use xlink:href="#twitter" /></svg></a></li>
                    <li><a href="#"><svg class="linkedin" width="20" height="20"><use xlink:href="#linkedin" /></svg></a></li>
                    <li><a href="#"><svg class="youtube" width="20" height="20"><use xlink:href="#youtube" /></svg></a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-2 col-sm-6 pb-3">
              <div class="footer-menu text-uppercase">
                <h5 class="widget-title pb-2">Quick Links</h5>
                <ul class="menu-list list-unstyled text-uppercase">
                  <li class="menu-item pb-2"><a href="{{ route('home') }}">Home</a></li>
                  <li class="menu-item pb-2"><a href="{{ route('shop') }}">Shop</a></li>
                  <li class="menu-item pb-2"><a href="{{ route('cart.index') }}">Cart</a></li>
                  <li class="menu-item pb-2"><a href="{{ route('checkout') }}">Checkout</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 pb-3">
              <div class="footer-menu text-uppercase">
                <h5 class="widget-title pb-2">Help & info</h5>
                <ul class="menu-list list-unstyled text-uppercase">
                  <li class="menu-item pb-2"><a href="#">Track Your Order</a></li>
                  <li class="menu-item pb-2"><a href="#">Returns + Exchanges</a></li>
                  <li class="menu-item pb-2"><a href="#">Shipping + Delivery</a></li>
                  <li class="menu-item pb-2"><a href="#">Contact Us</a></li>
                  <li class="menu-item pb-2"><a href="#">Find us</a></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 pb-3">
              <div class="footer-menu contact-item">
                <h5 class="widget-title text-uppercase pb-2">Contact Us</h5>
                <p>Do you have any queries or suggestions? <a href="mailto:contact@octaltraders.com">contact@octaltraders.com</a></p>
                <p>If you need support? Just give us a call. <a href="tel:+1234567890">+1 234 567 890</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div id="footer-bottom">
      <div class="container">
        <div class="row d-flex flex-wrap justify-content-between">
          <div class="col-md-4 col-sm-6">
            <div class="Shipping d-flex">
              <p>We ship with:</p>
              <div class="card-wrap ps-2">
                <img src="{{ asset('images/dhl.png') }}" alt="dhl">
                <img src="{{ asset('images/shippingcard.png') }}" alt="shippingcard">
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="Payment-methods d-flex">
              <p>Payment methods:</p>
              <div class="card-wrap ps-2">
                <img src="{{ asset('images/visa.jpg') }}" alt="visa">
                <img src="{{ asset('images/mastercard.jpg') }}" alt="mastercard">
                <img src="{{ asset('images/paypal.jpg') }}" alt="paypal">
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="copyright">
              <p>© Copyright 2026 Octal Traders.</p>
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
