@extends('layouts.master')

@section('header')
	<div class="uk-section uk-padding-remove-vertical uk-text-center">
    	<div class="uk-container">
			<h1>
		    	{!! $project->name !!}
		    </h1>
		    <h3>{!! $project->description !!}</h3>
		</div>
	</div> 
@stop

@section('content') 
	<div class="uk-section">
	    <div class="uk-container uk-container-large">
	    	<div class="uk-child-width-1-2@s uk-child-width-1-4@m uk-child-width-1-5@l uk-grid-match" uk-grid>
				@each('includes/groupCard', $groups, 'group')	
				@include('includes/formNewGroup')
			</div>
			
			<div class="uk-child-width-1-2@s uk-child-width-1-4@m uk-child-width-1-5@l uk-grid-match" uk-grid>
				@each('includes/teamCard', $teams, 'team')
				@include('includes/formNewTeam')
			</div>
	    </div>
    </div>
	
@stop