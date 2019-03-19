<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <title>Kenlex Telecoms Customer Portal
</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="{{ ('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ ('css/bootstrap-responsive.min.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ ('css/font-awesome.css') }}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="{{ ('css/style.css') }}" rel="stylesheet" type="text/css">
<link href="{{ ('css/pages/signin.css') }}" rel="stylesheet" type="text/css">

</head>

<body>
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="index.html">
			Kenlex Telecoms Customer Portal	
			</a>		
			
			
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->



<div class="account-container">
	
	<div class="content clearfix">
		
	<form action="{{ route('register') }}" method="post">	
		
			<h1>Registration</h1>		
			
            {{ csrf_field() }}
			<div class="login-fields">
			
				<div class="field">
					<label for="name">Name</label>
					<input type="text" id="name" name="name"  placeholder="Full Name" class="login username-field" required/>
                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                   @endif
                </div> <!-- /field -->
                <div class="field">
					<label for="email">Email</label>
					<input type="text" id="email" name="email"  placeholder="Email" class="login username-field" required/>
                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                </div> <!-- /field -->
                
				<div class="field">
					<label for="password">Password:</label>
					<input type="password" id="password" name="password"  placeholder="Password" class="login password-field" required/>
                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                </div> <!-- /password -->
                <div class="field">
					<label for="password-confirm">Password:</label>
					<input type="password" id="password-confirm" name="password_confirmation"  placeholder="Password" class="login password-field" required/>
				</div> <!-- /password -->
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">

				<button class="button btn btn-success btn-large" type="submit">Register</button>
				
			</div> <!-- .actions -->
			
			
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->




<script src="{{ ('js/jquery-1.7.2.min.js') }}"></script>
<script src="{{ ('js/bootstrap.js') }}"></script>

<script src="{{ ('js/signin.js') }}"></script>

</body>

</html>
