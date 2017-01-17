<!DOCTYPE html>
<html lang="en">

	@include('includes/head')

	<body class="uk-background-cover" style="background-image: url('{!! asset('/images/bg_0'.rand(2, 5).'.jpg') !!}');" uk-height-viewport>	

	@include('includes/nav')
		
		@yield('header')

        @yield('content')
        
		@include('includes/footer') 
	    
	</body>

</html>
