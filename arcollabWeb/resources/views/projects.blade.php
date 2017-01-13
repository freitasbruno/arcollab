@extends('layouts.master')

@section('header')

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