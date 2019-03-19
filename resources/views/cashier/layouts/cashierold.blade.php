<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title> Kenlex Telecoms Web Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="{{ asset('img/logo150.png') }}" rel="icon">
<link href="{{ asset('img/logo150.png') }}" rel="apple-touch-icon">
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/bootstrap-responsive.min.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
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
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span><a href="{{ url('/') }}" class="scrollto brand"><img src="{{ asset('img/kenlexlogo.png') }}"> Cashier</a>
 
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
      
        <li><a href="/cashier/dashboard"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
        <li><a href="/cashier/transactions"><i class="icon-list-alt" aria-hidden="true"></i><span>Transactions</span> </a></li>
        <li><a href="/cashier/items"><i class="icon-th" aria-hidden="true"></i><span>Products</span> </a></li>
        <li><a href="/cashier/inventory"><i class="icon-th" aria-hidden="true"></i><span>Inventory</span> </a></li>
        <li><a href="/cashier/packages"><i class="icon-table" aria-hidden="true"></i><span>Packages</span> </a></li>
        <li><a href="/cashier/subscribers"><i class="icon-group" aria-hidden="true"></i><span>Subscribers</span> </a></li>
        <li><a href="/cashier/dealers"><i class="icon-user" aria-hidden="true"></i><span>Dealers</span> </a></li>
        <li><a href="/cashier/receiving"><i class="icon-truck" aria-hidden="true"></i><span>Receiving</span> </a></li>
        <li><a href="/cashier/return"><i class="icon-refresh" aria-hidden="true"></i><span>Returns</span> </a></li>
        <li><a href="/cashier/history"><i class="icon-list-alt" aria-hidden="true"></i><span>History</span> </a></li>
        <li><a href="/cashier/account"><i class="icon-user" aria-hidden="true"></i><span>Account</span> </a></li>
        <!-- <li><a href="/cashier/report"><i class="icon-th-list" aria-hidden="true"></i><span>Report</span> </a></li> -->
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
        <div class="span12"> <a href="#">Kenlex Telecoms Web Portal</a> &copy; 2018 </div>
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
