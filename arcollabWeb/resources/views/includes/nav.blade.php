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