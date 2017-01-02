<?php
	$projects = Project::all();
	$user = Auth::user();
?>

@extends('layouts.master')

@section('header')

	<h1>
    	PROJECTS
    </h1>
    
@stop

@section('content')

	@foreach($projects as $project)
		<div class="col-lg-2 col-md-3 col-sm-6 col-centered hero-feature">
	        <div class="thumbnail">
	            <img src="http://placehold.it/800x500" alt="">
	            <div class="caption">
	                <h3>{{ $project->name }}</h3>
	                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
	                <p>
	                    <a href="/project/{{ $project->id }}" class="btn btn-primary">OPEN</a> <a href="/deleteProject/{{ $project->id }}" class="btn btn-default">Delete</a>
	                </p>
	            </div>
	        </div>
	    </div>
	@endforeach
	
	<div class="col-lg-2 col-md-3 col-sm-6 col-centered hero-feature">
        <div class="thumbnail">
        	<img src="http://placehold.it/800x500" alt="">
            <div class="caption">
            	<h3>New Project</h3>
                {!! BootForm::open(array('url' => 'newProject')) !!}
					{!! BootForm::text('name', false) !!}
					{!! BootForm::submit('Create') !!}
				{!! BootForm::close() !!}
            </div>
        </div>
    </div>
	
@stop