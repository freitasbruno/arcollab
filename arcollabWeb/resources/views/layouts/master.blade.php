<!DOCTYPE html>
<html lang="en">

	@include('includes/head')

	<body>

		@include('includes/nav')
		@include('includes/navSide')

		@yield('header')
        @yield('content')

	</body>

</html>

{!! Html::script('js/custom.js') !!}
