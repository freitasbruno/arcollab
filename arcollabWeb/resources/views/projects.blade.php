@extends('layouts.master')

@section('header')

@stop

@section('content')
	<div class="uk-section">
	    <div class="uk-container uk-container-large uk-text-center">
			@if (count($projects) == 0)
	    	<h2 class="uk-text-center">START A NEW PROJECT</h2>
			@else
			<h2 class="uk-text-uppercase">MY PROJECTS</h2>
			@endif

			@each('includes/projectCard', $projects, 'project')
			@each('includes/projectCard', $sharedProjects, 'project')
			@include('forms/formNewProject')

		</div>
	</div>
@stop
