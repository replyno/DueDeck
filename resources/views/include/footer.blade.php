<style>
  .brcbc{
    border-color: #0789b5;
    color: #0789b5;
    border-radius: 30px;
  }
  .brcbc:hover {
    border-color: #0789b5;
    color: #fff;
    border-radius: 30px;
    background-color: #0789b5;
}
.mt-60{
  margin-top: -60px;
}
.mt-50-ml-15{
  margin-top: -50px;
    margin-left: -15px;
}
</style>
<div class="container pt-4">
        <div class="row mb-2">
          <div class="col-md-3 text-md-start text-center">
            <a href="/">
            <img src="{{ asset('images/dd.webp') }}" alt="Footer Logo" class="img-fluid mb-3 mt-50-ml-15" width="180">
            </a>
            <p class="mt-60">
              <a href="https://m.facebook.com/duedeck" target="_blank" class="social-link"><i class="bi bi-facebook"></i></a>
              <a href="https://www.linkedin.com/products/eligo-apptech-pvt-ltd-duedeck/" target="_blank" class="social-link"><i class="bi bi-linkedin"></i></a>
              <a href="https://twitter.com/DueDeckOfficial" target="_blank" class="social-link"><i class="bi bi-twitter"></i></a>
              <a href="https://www.youtube.com/@duedeck1039" target="_blank" class="social-link"><i class="bi bi-youtube"></i></a>
            </p>
          </div>
          <div class="col-md-3 col-6">
            <ul class="footer-nav">
              <li><a href="/#home">Home</a></li>
              <li><a href="/aboutus">About Us</a></li>
              <li><a href="/contact">Contact</a></li>
              <li><a href="/#features">Features</a></li>
            </ul>
          </div>
          <div class="col-md-3 col-6">
            <ul class="footer-nav">
              <!-- <li><a href="/#whyduedeck">Why Duedeck?</a></li> -->
              <li><a href="/#pricing">Pricing</a></li>
              <li><a href="/privacypolicy">Privacy & Policy</a></li>
              <li><a href="/termsconditions">Terms & Conditions</a></li>
            </ul>
          </div>
          <div class="col-md-3 ">
          <ul class="footer-nav text-md-start text-center cotntacts-links">
              <li><a href="tell:+919011691169"><i class="bi bi-telephone-fill"></i> +91 9011691169</a></li>
              <li><a href="tell:+917769974289"><i class="bi bi-telephone-fill"></i> +91 7769974289</a></li>
              <li><a href="mailto:hello@duedeck.com"><i class="bi bi-envelope-fill"></i> hello@duedeck.com</a></li>
              </ul>
          </div>

        </div>
    </div>
    <div class="footer-copy-right text-center text-white">
      <p class="mb-0">Copyright © <?php echo date('Y'); ?> ELIGO AppTech Private Limited. All Rights Reserved.</p>
    </div>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <!-- <script src="{{ asset('js/wow.min.js') }}"></script> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.1/wow.min.js"></script>
    <script>
      new WOW().init();
    </script>
