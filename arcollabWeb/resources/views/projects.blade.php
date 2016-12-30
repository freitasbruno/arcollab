<?php
	$projects = Project::all();
?>

@extends('layouts.master')

@section('header')

	<h1>
    	PROJECTS
    </h1>
    <hr>
    
@stop

@section('content')

	@foreach($projects as $project)
		<div class="col-md-3">
			{{ $project->name }}
		</div>
	@endforeach
	
	<div class="spacer40"></div>
		<div class="col-md-3 col-centered">
			{!! BootForm::open(array('url' => 'newProject')) !!}
				{!! BootForm::text('name') !!}
				{!! BootForm::submit('Create') !!}
			{!! BootForm::close() !!}
		</div>
	<div class="spacer40"></div>
	
@stop