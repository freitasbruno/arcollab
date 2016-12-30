<!DOCTYPE html>
<html>
    <head>
        <title>ARCOLLAB</title>

		<!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Yantramanav:300' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
        
        <!-- Bootstrap Core CSS -->
    	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        
        <!-- Custom CSS -->
		<link rel="stylesheet" href="{{ asset('css/custom.css') }}" type="text/css">
		
		<meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>
    	
	    <!-- Navigation -->
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		        </button>
		        <a class="navbar-brand" href="{{ URL::to('/') }}">
		        	<p class="nav-icon">ARCOLLAB</p>
		        	<!--<img src="{{ asset('images/go_logo.png') }}" class="nav-icon"/>-->
		        </a>
		    </div>
		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		        <ul class="nav navbar-nav pull-right">
		            	<li><a href="{{ URL::to('/home') }}">HOME</a></li>
		            	<li><a href="{{ URL::to('/roadmap') }}">PROGRESS</a></li>
		            	<li><a href="{{ URL::to('/') }}">ABOUT</a></li>
		        </ul>
		    </div>
		    <!-- /.navbar-collapse -->
		</nav>
    	
    	<div class="container">
    		<div class="col-md-6 col-centered text-center">
    			@yield('header')
    		</div>
    	</div>
    	
    	<div class="container">
    		@yield('content')
    	</div>
    	
    	<div class="footer">
		    <p class="text-muted text-center">ARCOLLAB | Bruno Freitas 2016</p>
    	</div>
    	
    	<!-- JQuery Files -->
		<script src="https://code.jquery.com/jquery.min.js"></script>
	    <!-- Bootstrap Core JavaScript -->
	    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>
