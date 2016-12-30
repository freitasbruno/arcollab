@extends('layouts.master')

@section('header')

	<h1>
    	ARCOLLAB
    </h1>
    <hr>
    <h3>
    	AEC Information Management
    </h3>
    <h3 class="intro">
    	<span class="small">
    		A Laravel + Neo4j open source solution for AEC information management. It is meant to allow to track project information, storing files, allow comments and issue management.
    	</span>
    </h3>

@stop

@section('content') 

	<div class="spacer20"></div>
	<div class="col-md-4 col-centered text-center">
		<div class="spacer60"></div>
		<h3>CHECK THE PROGRESS</h3>
		<h3 class="text-center">
	    	<span class="small">
	    		ARCOLLAB is a Open Source project, the source code is available on Github for download!
	    	</span>
	    	<div class="spacer20"></div>
	    	<a href="{{ URL::to('https://github.com/freitasbruno/arcollab.git') }}" target="blank"><img src="{{ asset('images/GitHub-Mark-64px.png') }}" /></a>
	    </h3>
	</div>
	
@stop