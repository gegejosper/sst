<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/ico" />

    <title>SST Portal | Checker </title>

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
  </head>

  <body class="login">
  <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
		  <form action="{{ route('checker.login') }}" method="post">	
			  <h1>Checker Login Form</h1>
			  
			  {{ csrf_field() }}
			@if (session('error'))
				<div class="alert alert-warning">
					{{ session('error') }}
				</div>
			@endif
              
              <div>
			  <input type="text" id="email" name="email" value="" placeholder="Email" class="login username-field form-control" required />
              </div>
              <div>
			  <input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field form-control" required/>
              </div>
              <div>
			  <button class="btn btn-default submit" type="submit">Sign In</button>
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>

              <div class="clearfix"></div>

              <div class="separator">
               

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> SST Portal</h1>
                  <p>©2018 All Rights Reserved. Developer by: <a href="http://gbceniza.com">Gegejosper Ceniza</a></p>
                </div>
              </div>
            </form>
          </section>
        </div>	
</div>



<script src="{{ asset('js/jquery-1.7.2.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>

<script src="{{ asset('js/signin.js') }}"></script>

</body>

</html>
