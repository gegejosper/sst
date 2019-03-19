<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>SST</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="enterprise" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{ asset('img/kenlexlogo.png') }}" rel="icon">
  <link href="{{ asset('img/kenlexlogo.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link href="{{ asset('lib/magnific-popup/magnific-popup.cs') }}s" rel="stylesheet">
  <link href="{{ asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body id="body">

  <!--==========================
    Top Bar
  ============================-->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="fa fa-envelope-o"></i> <a href="mailto:archie@chingching.com">info@kenlextelecoms.com</a>
        <i class="fa fa-phone"></i> 0000 - 0000 - 000
      </div>
      <div class="social-links float-right">
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
      </div>
    </div>
  </section>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="{{ url('/') }}" class="scrollto"><img src="{{ asset('img/kenlexlogo.png') }}"></a>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="{{ url('/') }}">Home</a></li>
          <!-- <li><a href="#">About Us</a></li>
          <li><a href="#">Services</a></li>
          <li><a href="#">Products</a></li>
          <li><a href="#">Contact</a></li> -->

          <li><a href="{{ url('/about') }}">About Us</a></li>
          <li><a href="{{ url('/services') }}">Services</a></li>
          <li><a href="{{ url('/product') }}">Products</a></li>
          <li><a href="{{ url('/contact') }}">Contact</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

         @yield('content')

 <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="wow fadeInUp" style="padding-top:100px;">
      <div class="container">
        <div class="section-header">
          <h2 align="center">Contact Us</h2>
          <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>Poblacion, Aurora Zamboanga Del Sur</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+155895548855">0000 - 0000 - 000</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@kenlextelecoms.com">info@kenlextelecoms.com</a></p>
            </div>
          </div>

        </div>
      </div>
      <div id="google-map" data-latitude="7.952958" data-longitude="123.588806"></div>
    </section><!-- #contact -->

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Kenlex Telecoms</strong>. All Rights Reserved 2018
      </div>
      <div class="credits">
        Developed by <a href="http://gbceniza.com"> EasyWay Apps</a> 
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.j') }}s"></script>
  <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('lib/superfish/hoverIntent.js') }}"></script>
  <script src="{{ asset('lib/superfish/superfish.min.js') }}"></script>
  <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
  <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('lib/magnific-popup/magnific-popup.min.js') }}"></script>
  <script src="{{ asset('lib/sticky/sticky.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>
  <!-- Contact Form JavaScript File -->


  <!-- Template Main Javascript File -->
  <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
