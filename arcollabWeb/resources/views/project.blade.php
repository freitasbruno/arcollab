@extends('layouts.master')

@section('header')

	<!-- Jumbotron Header -->
    <header class="jumbotron hero-spacer">
        <h1>{{ $project->name }}</h1>
        <h3>AEC Information Management</h3>
        <p>A Laravel + Neo4j open source solution for AEC information management. It is meant to allow to track project information, storing files, allow comments and issue management.</p>
        <p><a class="btn btn-primary btn-large">Call to action!</a>
        </p>
    </header>
    
@stop

@section('content') 

	<div class="col-md-4 col-centered text-center">
		<h3 class="text-center">
			CHECK THE PROGRESS
			<br>
			<span class="small">ARCOLLAB is a Open Source project, the source code is available on Github for download!</span>
			<br>
	    	<a href="{{ URL::to('https://github.com/freitasbruno/arcollab.git') }}" target="blank"><img src="{{ asset('images/GitHub-Mark-64px.png') }}" class="hero-spacer"/></a>
	    </h3>
	</div>
	
@stop