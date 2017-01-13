<!DOCTYPE html>
<html lang="en">

	<head>
	
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="A Laravel + Neo4j open source solution for AEC information management.">
	    <meta name="author" content="Bruno Freitas">
	
	    <title>ARCOLLAB</title>
	    
	    <!-- css -->
	    {!! Html::style('css/uikit.min.css') !!}
	    {!! Html::style('css/style.css') !!}
		
	    <!-- js -->
	    {!! Html::script('js/jquery.js') !!}
	    {!! Html::script('js/uikit.min.js') !!}

	    
	</head>
	
	<body>	
		<!-- Navigation -->
		<nav class="uk-navbar-container" uk-navbar>
		    <!-- left -->
		    <div class="uk-navbar-left">
		    	<a class="uk-navbar-item uk-logo" href="/home">ARCOLLAB</a>
		    </div>
		    <!-- right -->
		    <div class="uk-navbar-right uk-visible@s">
		        <ul class="uk-navbar-nav">
		            <li><a href="/home">HOME</a></li>
	                <li><a href="/about">ABOUT</a></li>
	            	@if(is_null(session()->get('user_id')))
	            		<li><a href="/register">REGISTER</a></li>
	            		<li><a href="/login">LOGIN</a></li>
	                @else
	                	<li><a href="/projects">PROJECTS</a></li>
	            		<li><a href="/logout">LOGOUT</a></li>
	                @endif
		        </ul>
		    </div>
		    <div class="uk-navbar-right uk-hidden@s">
			    <a class="uk-navbar-toggle" href="#offcanvas-slide" uk-toggle>
		            <span uk-navbar-toggle-icon></span> <span class="uk-margin-small-left">Menu</span>
		        </a>
		    </div>
		</nav>
    	
    	<div id="offcanvas-slide" uk-offcanvas="flip: true; overlay: true">
		    <div class="uk-offcanvas-bar">
		        <ul class="uk-nav uk-nav-default">
			        <li class="uk-nav-header">Main Menu</li>
			        <li><a href="/home">HOME</a></li>
	                <li><a href="/about">ABOUT</a></li>
	            	@if(is_null(session()->get('user_id')))
	            		<li><a href="/register">REGISTER</a></li>
	            		<li><a href="/login">LOGIN</a></li>
	                @else
	                	<li><a href="/projects">PROJECTS</a></li>
	            		<li><a href="/logout">LOGOUT</a></li>
	                @endif
			        <li class="uk-nav-divider"></li>
			        <li><a href="#">Item</a></li>
			    </ul>
		    </div>
		</div>
		
    	<!-- Page Content -->
		@yield('header')

        <!-- Title -->
        @yield('content')
        <!-- /.row -->
        
    	 <!-- Footer 
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p class="text-muted text-center">ARCOLLAB | Bruno Freitas 2016</p>
                </div>
            </div>
        </footer>
		-->

	    <!-- Bootstrap Core JavaScript -->
	    {!! Html::script('js/bootstrap.min.js') !!}
	    
	</body>

</html>
