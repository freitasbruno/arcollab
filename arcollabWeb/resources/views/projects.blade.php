@extends('layouts.master')

@section('header')
	<h1>
    	PROJECTS
    </h1>
@stop

@section('content')

	<div class='row row-centered'>
		@each('includes/projectCard', $projects, 'project')
		@include('includes/formNewProject')
	</div>
	
	<div class='row row-centered'>
		@each('includes/projectCard', $sharedProjects, 'project')
	</div>

@stop