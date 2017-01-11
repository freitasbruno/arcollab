<!DOCTYPE html>
<html lang="en">

	<head>
	
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	    <title>ARCOLLAB</title>
	
	    <!-- Bootstrap Core CSS -->
	    {!! Html::style('css/bootstrap.css') !!}
	
	    <!-- Custom CSS -->
	    {!! Html::style('css/style.css') !!}
	    {!! Html::style('css/uikit.min.css') !!}
	
	    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	    <![endif]-->
		
	</head>
	
	<body>	
	
	<!-- Navigation -->
	    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	        <div class="container-fluid">
	            <!-- Brand and toggle get grouped for better mobile display -->
	            <div class="navbar-header">
	                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	                <a class="navbar-brand" href="/home">ARCOLLAB</a>
	            </div>
	            <!-- Collect the nav links, forms, and other content for toggling -->
	            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	                <ul class="nav navbar-nav navbar-right">
	                    <li>
	                        <a href="/home">HOME</a>
	                    </li>
	                    <li>
	                        <a href="/about">ABOUT</a>
	                    </li>
                    	@if(is_null(session()->get('user_id')))
                    		<li>
                    			<a href="/register">REGISTER</a>
                    		</li>
                    		<li>
                    			<a href="/login">LOGIN</a>
                    		</li>
                        	
                        @else
                        	<li>
                    			<a href="/projects">PROJECTS</a>
                    		</li>
                    		<li>
                    			<a href="/logout">LOGOUT</a>
                    		</li>
                        @endif
	                </ul>
	            </div>
	            <!-- /.navbar-collapse -->
	        </div>
	        <!-- /.container -->
	    </nav>    	
	   
    	
    	<!-- Page Content -->
    	<div class="container-fluid">
    		@yield('header')
    	
	    	<hr>
	
	        <!-- Title -->
	        <div class="row row-centered">
	            @yield('content')
	        </div>
	        <!-- /.row -->
	        
	    	 <!-- Footer -->
	        <footer>
	            <div class="row">
	                <div class="col-lg-12">
	                    <p class="text-muted text-center">ARCOLLAB | Bruno Freitas 2016</p>
	                </div>
	            </div>
	        </footer>

	    </div>
	    <!-- /.container -->
	
	    <!-- jQuery -->
	    {!! Html::script('js/jquery.js') !!}
	
	    <!-- Bootstrap Core JavaScript -->
	    {!! Html::script('js/bootstrap.min.js') !!}
	    
	    <!-- UI Kit JavaScript -->
	    {!! Html::script('js/uikit.min.js') !!}
	</body>

</html>
