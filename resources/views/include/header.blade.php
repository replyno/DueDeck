<!-- <div class="notification-header">
<div class="container">
  <div class="row">

    <div class="col-md-12 text-center">
        <a href="/contact" target="_blank" class="top-nav-link">Get 21 Days Free Trial <i class="bi bi-arrow-right"></i></a>
    </div>
  </div>
</div>
</div> -->
<nav id="duedeck-navbar" class="navbar navbar-expand-md px-3 header-nav">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="{{ asset('images/duedeck-R.svg') }}" alt="Duedeck Logo" width="122" height="40"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse" id="navbarSupportedContent">
        <ul class="nav navbar-nav ms-auto ">
          <li class="nav-item">
            <a class="nav-link" href="/#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/aboutus">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/#features">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/#pricing">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contact">Contact Us</a>
          </li>
          <li class="nav-item nav-btn me-md-2 ms-md-3 mb-md-0 mb-3">
            <a class="nav-link btn-link" href="/#pricing"><i class="bi bi-arrow-down-circle"></i> Buy Now</a>
          </li>
          <li class="nav-item nav-btn" id="signIn">
            <a class="nav-link btn-link" href="{{ config('constants.DEFAULT_URL') }}" target="_blank"><i class="bi bi-person-add"></i> Sign In</a>
          </li>
        </ul>
      </div>
    </div>
</nav>

<script>
  var x = window.matchMedia("(max-width: 700px)")
  if (x.matches) {
    var navbarSupportedContent = document.getElementById("navbarSupportedContent");
    navbarSupportedContent.classList.add("collapse");

    var signIn = document.getElementById("signIn");
    signIn.classList.add("outline");
  }
</script>
