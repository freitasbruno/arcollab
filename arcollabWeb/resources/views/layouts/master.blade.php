<!DOCTYPE html>
<html lang="en">

	@include('includes/head')

	<body>

		@include('includes/nav')
		@include('includes/navSide')

		@yield('header')
        @yield('content')


		@if (Session::has('msgSuccess'))
		   <div id="msgSuccess" class="notification" hidden="true">{{ Session::get('msgSuccess') }}</div>
		   <?php session()->forget('msgSuccess'); ?>
		@endif
		@if (Session::has('msgWarning'))
		   <div id="msgWarning" class="notification" hidden="true">{{ Session::get('msgWarning') }}</div>
		   <?php session()->forget('msgWarning'); ?>
		@endif
		@if (Session::has('msgError'))
		   <div id="msgError" class="notification" hidden="true">{{ Session::get('msgError') }}</div>
		   <?php session()->forget('msgError');	?>
		@endif
		@if (Session::has('msgInformation'))
		   <div id="msgInformation" class="notification" hidden="true">{{ Session::get('msgInformation') }}</div>
		   <?php session()->forget('msgInformation'); ?>
		@endif

	</body>

</html>
