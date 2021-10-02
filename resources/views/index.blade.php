<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Medical Uncle</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,700,800" rel="stylesheet" />
    <link rel="stylesheet" href="{{ url('css/open-iconic-bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ url('css/animate.css') }}" />
    <link rel="stylesheet" href="{{ url('css/aos.css') }}" />
    <link rel="stylesheet" href="{{ url('css/ionicons.min.css') }}" />
    <link rel="stylesheet" href="{{ url('css/bootstrap-datepicker.css') }}" />
    <link rel="stylesheet" href="{{ url('css/jquery.timepicker.css') }}" />
    <link rel="stylesheet" href="{{ url('css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ url('css/icomoon.css') }}" />
    <link rel="stylesheet" href="{{ url('css/style.css') }}" />
    <link rel="shortcut icon" href="{{ url('/assets/images/favicon.png') }}" type="image/x-icon">
  </head>
  <body>
    <nav
      class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light"
      id="ftco-navbar"
    >
      <div class="container">
        <a class="navbar-brand" href="index.html">Medical Uncle</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#ftco-nav"
          aria-controls="ftco-nav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item cta">
              <a href="{{ url('login') }}" class="nav-link"><span>Login to Admin Panel</span></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->

    <!-- <div class="js-fullheight"> -->
    <div class="hero-wrap js-fullheight">
      <div class="overlay"></div>
      <div id="particles-js"></div>
      <div class="container">
        <div
          class="row no-gutters slider-text align-items-center justify-content-center"
          data-scrollax-parent="true"
        >
          <div
            class="col-md-6 ftco-animate text-center"
            data-scrollax=" properties: { translateY: '70%' }"
          >
            <h1
              class="mb-4"
              data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"
            >
              We love to find <strong>Medical Devices</strong> fastly
            </h1>
            <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">
              <a
                href="{{ url('login') }}"
                class="btn btn-primary btn-outline-white px-5 py-3"
                >Are You a Buyer?</a
              >
              <a
                href="{{ url('login') }}"
                class="btn btn-primary btn-outline-white px-5 py-3"
                >Are You a Seller?</a
              >
            </p>
          </div>
        </div>
      </div>
    </div>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
      <svg class="circular" width="48px" height="48px">
        <circle
          class="path-bg"
          cx="24"
          cy="24"
          r="22"
          fill="none"
          stroke-width="4"
          stroke="#eeeeee"
        />
        <circle
          class="path"
          cx="24"
          cy="24"
          r="22"
          fill="none"
          stroke-width="4"
          stroke-miterlimit="10"
          stroke="#F96D00"
        />
      </svg>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/particles.min.js"></script>
    <script src="js/particle.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
