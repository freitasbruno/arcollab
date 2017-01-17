<?php 
	$uri = trim($_SERVER['REQUEST_URI'], "/");
	$flag = $uri == 'login' || $uri == 'register';
?>

<footer>
	<div class="uk-section uk-section-secondary uk-text-center uk-padding-small {!! $flag ? 'uk-position-bottom' : false !!}">
    	<div class="uk-container uk-container-small">
			<h5 class="text-muted text-center">ARCOLLAB | Bruno Freitas 2016</h5>
		</div>
	</div>
</footer>