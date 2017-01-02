@extends('layouts.master')

@section('header')

	<!-- Jumbotron Header -->
    <header class="jumbotron hero-spacer">
        <h1>{!! $project->name !!}</h1>
        <p>{!! $project->description !!}</p>
        <p><a class="btn btn-primary btn-large">Call to action!</a></p>
    </header>
    
@stop

@section('content') 

	<div class="col-md-4 col-centered text-center">
		<h3 class="text-center">
			Project Groups 
	    </h3>
	</div>
	
@stop