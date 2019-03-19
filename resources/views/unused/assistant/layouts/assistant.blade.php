<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title> Ching Ching Enterprise Web Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="{{ asset('img/logo150.png') }}" rel="icon">
<link href="{{ asset('img/logo150.png') }}" rel="apple-touch-icon">
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/bootstrap-responsive.min.css') }}" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
<link href="{{ asset('css/backendstyle.css') }}" rel="stylesheet">
<link href="{{ asset('css/pages/dashboard.css') }}" rel="stylesheet">
<link href="{{ asset('js/guidely/guidely.css') }}" rel="stylesheet"> 
<link href="{{ asset('css/pages/reports.css') }}" rel="stylesheet">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
<script src="{{ asset('js/itsolutions.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
</head>
<body>
<div class="navbar navbar-fixed-top noprint">
  <div class="navbar-inner">
    <div class="container"> <a href="/" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span><a href="{{ url('/') }}" class="scrollto brand"><img src="{{ asset('img/logohorizontal.png') }}"> Assistant</a>
 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar noprint">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
      <li><a href="/"><i class="icon-home"></i><span>Main Website</span> </a> </li>
        <li><a href="/assistant/dashboard"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
        <li><a href="/assistant/items"><i class="icon-th" aria-hidden="true"></i><span>Products</span> </a></li>
        <li><a href="/assistant/orders"><i class="icon-shopping-cart" aria-hidden="true"></i><span>Order Request</span> </a></li>
        <li><a href="/assistant/bookings"><i class="icon-envelope" aria-hidden="true"></i><span>Bookings</span> </a></li>
        <li><a href="/assistant/transports"><i class="icon-truck" aria-hidden="true"></i><span>Transport</span> </a></li>
        <!-- <li><a href="/admin/products"><i class="icon-qrcode" aria-hidden="true"></i><span>Products</span> </a></li>
        <li><a href="/admin/stocks"><i class="icon-th" aria-hidden="true"></i><span>Stocks</span> </a></li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-gear"></i><span>Settings</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="/admin/settings">Settings</a></li>
            <li><a href="/admin/categories">Categories</a></li>
            <li><a href="/admin/suppliers">Suppliers</a></li>
            <li><a href="/admin/brands">Brands</a></li>
          </ul>
        </li> -->

        <li>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" ><i class="icon-key"></i><span>Logout</span></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
      
       
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->
@yield('content')

<!-- /extra -->
<div class="footer noprint">
  <div class="footer-inner">
    <div class="container">
      <div class="row">
        <div class="span12"> <a href="#">Ching Ching Enterprise Web Portal</a> &copy; 2018 </div>
        <!-- /span12 --> 
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /footer-inner --> 
</div>
<!-- /footer --> 
<!-- Le javascript
================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 
<script src="{{ asset('js/jquery-1.7.2.min.js') }}"></script> 
<script src="{{ asset('js/excanvas.min.js') }}"></script> 
<script src="{{ asset('js/chart.min.js') }}" type="text/javascript"></script> 
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script language="javascript" type="text/javascript" src="{{ ('js/full-calendar/fullcalendar.min.js') }}"></script>
 
<script src="{{ asset('js/base.js') }}"></script> 

</body>
</html>
