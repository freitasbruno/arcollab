@extends('layouts.master')

@section('header')
	@include('includes/projectHeader')
@stop

@section('content')
	<div class="uk-section uk-padding-remove-top">
	    <div class="uk-container uk-container-large">
	    	<div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l" uk-grid>
				@each('includes/teamCard', $teams, 'team')
				@include('forms/formNewTeam')
			</div>
	    </div>
		@if (Session::has('message'))
		   <div id="msg" class="uk-hidden">{{ Session::get('message') }}</div>
		@endif
    </div>
@stop
