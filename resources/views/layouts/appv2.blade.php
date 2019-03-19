<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Chingching Enterprises Official website that will offer online ordering of our products.">
    <meta name="author" content="Archie Yongco">

    <title>Ching-Ching Enterprises Web Portal</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendortheme/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tag.css') }}" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/shop-homepage.css') }}" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="/"><img src="{{ asset('img/logohorizontal.png') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/about/#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/shop">Shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/cart">Cart</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/about/#contact">Contact</a>
            </li>
            <?php if($userId != 'none') {?>
            <li class="nav-item">
              <a class="nav-link" href="/customer/dashboard">Account</a>
            </li>
            <?php } else {?>
            <li class="nav-item">
              <a class="nav-link" href="/customer">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/userregister">Register</a>
            </li>
            <?php }?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    @yield('content')
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-3 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; PhilipMotorParts.com</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendortheme/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendortheme/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  </body>
  <script>
    // Select all links with hashes
    $('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
        // On-page links
        if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
        && 
        location.hostname == this.hostname
        ) {
        // Figure out element to scroll to
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        // Does a scroll target exist?
        if (target.length) {
            // Only prevent default if animation is actually gonna happen
            event.preventDefault();
            $('html, body').animate({
            scrollTop: target.offset().top
            }, 1000, function() {
            // Callback after animation
            // Must change focus!
            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) { // Checking if the target was focused
                return false;
            } else {
                $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                $target.focus(); // Set focus again
            };
            });
        }
        }
    });
</script>
</html>
