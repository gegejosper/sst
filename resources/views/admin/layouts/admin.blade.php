<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/ico" />

    <title>SST Portal | Admin </title>

    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="{{ asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('build/css/custom.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/admin/dashboard" class="site_title"><i class="fa fa-paw"></i> <span>SST Portal</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">

                  <li><a href="/admin/dashboard"><i class="fa fa-home"></i><span>Dashboard</span> </a> </li>
                  <li><a ><i class="fa fa-barcode" aria-hidden="true"></i><span>Products</span> <b class="caret"></b></a>
                    <ul class="nav child_menu">
                      <li><a href="/admin/products/add">Add Product</a></li>
                      <li><a href="/admin/products">View Products</a></li>
                    </ul>
                  </li>
                  <li><a href="/admin/stocks"><i class="fa fa-database" aria-hidden="true"></i><span>Stocks</span> </a></li>
                  <li><a href="/admin/distribution"><i class="fa fa-exchange" aria-hidden="true"></i><span>Distribution</span> </a></li>
                  <li><a href="/admin/purchase"><i class="fa fa-folder-open" aria-hidden="true"></i><span>Purchases</span> </a></li>
                  <!-- <li><a href="/admin/members"><i class="icon-user"></i><span>Members</span> </a> </li> -->
                  <li><a href="/admin/branchs"><i class="fa fa-map-marker"></i><span>Branch</span> </a> </li>
                  <li><a href="/admin/report"><i class="fa fa-bar-chart"></i><span>Report</span> </a> </li>
                  <li><a href="/admin/returns"><i class="fa fa-mail-reply" aria-hidden="true"></i><span>Returns</span> </a></li>
                  <li><a><i class="fa fa-gear"></i><span>Settings</span> <b class="caret"></b></a>
                              <ul class="nav child_menu">
                                <li><a href="/admin/settings">Settings</a></li>
                                <li><a href="/admin/categories">Categories</a></li>
                                <li><a href="/admin/brands">Brands</a></li>
                                <li><a href="/admin/users">Users</a></li>
                              </ul>
                  </li>
                  <li>
                      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" ><i class="fa fa-lock"></i><span>Logout</span></a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li> 
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
          </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav hidden-print" >
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
        @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer class="hidden-print">
          <div class="pull-right">
            Developed by: <a href="http://gbceniza.com">Gegejosper Ceniza</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- gauge.js -->
    <script src="{{ asset('vendors/gauge.js/dist/gauge.min.js') }}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{ asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <!-- iCheck -->
    <script src="{{ asset('vendors/iCheck/icheck.min.js') }}"></script>
    <!-- Skycons -->
    <script src="{{ asset('vendors/skycons/skycons.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('vendors/DateJS/build/date.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
    <script src="{{ asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Custom Theme Scripts -->
    <script src="{{ asset('build/js/custom.min.js') }}"></script>
	
  </body>
</html>
