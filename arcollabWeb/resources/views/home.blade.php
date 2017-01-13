@extends('layouts.master')

@section('header')

	<div class="uk-section uk-section-media uk-light uk-background-cover" style="background-image: url(images/bg_01.jpg)" uk-height-viewport="expand: true">
    	<div class="uk-container uk-container-small uk-text-center uk-flex uk-flex-middle">
    		<div>
	    		<h1>ARCOLLAB</h1>
		        <h3>AEC Information Management</h3>
		        <h4>A Laravel + Neo4j open source solution for AEC information management. It is meant to allow to track project information, storing files, allow comments and issue management.</h4>
    		</div>
	        
    	</div>
    </div>
    
@stop

@section('content') 

	<div class="uk-section uk-section-secondary uk-text-center">
    	<div class="uk-container uk-container-small">
			<h3>CHECK THE PROGRESS ON GITHUB</h3>
			<h4 class="uk-margin">ARCOLLAB is a Open Source project, the source code is available on Github for download!</h4>
		    <a href="{{ URL::to('https://github.com/freitasbruno/arcollab.git') }}" target="blank"><img src="{{ asset('images/GitHub-Mark-Light-64px.png') }}" class="hero-spacer"/></a>
		    
		</div>
	</div>
	
@stop