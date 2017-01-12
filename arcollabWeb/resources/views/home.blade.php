@extends('layouts.master')

@section('header')

	<div class="uk-section uk-section-muted uk-text-center">
    	<div class="uk-container uk-container-small">
	        <h1>ARCOLLAB</h1>
	        <h3>AEC Information Management</h3>
	        <p>A Laravel + Neo4j open source solution for AEC information management. It is meant to allow to track project information, storing files, allow comments and issue management.</p>
    	</div>
    </div>
    
@stop

@section('content') 

	<div class="uk-section uk-section-secondary uk-text-center">
    	<div class="uk-container uk-container-small">
			<h3>
				CHECK THE PROGRESS
				<br>
				<span class="small">ARCOLLAB is a Open Source project, the source code is available on Github for download!</span>
				<br>
		    	<a href="{{ URL::to('https://github.com/freitasbruno/arcollab.git') }}" target="blank"><img src="{{ asset('images/GitHub-Mark-64px.png') }}" class="hero-spacer"/></a>
		    </h3>
		</div>
	</div>
	
@stop