@extends('layouts.master')

@section('header')
	<div class="uk-section uk-padding-remove-vertical uk-text-center">
    	<div class="uk-container">
			<h1>
		    	PROJECTS
		    </h1>
		</div>
	</div>    
@stop

@section('content')
	<div class="uk-section">
	    <div class="uk-container uk-container-large">
			<div class="uk-child-width-1-2@s uk-child-width-1-4@m uk-child-width-1-5@l uk-grid-match" uk-grid>
				@each('includes/projectCard', $projects, 'project')
				@include('includes/formNewProject')
			</div>
			
			<div class="uk-child-width-1-2@s uk-child-width-1-4@m uk-child-width-1-5@l uk-grid-match" uk-grid>
				@each('includes/projectCard', $sharedProjects, 'project')
			</div>
		</div>
	</div>
@stop