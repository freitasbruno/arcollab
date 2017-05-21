@extends('layouts.master')

@section('header')
	@include('includes/projectHeader')
@stop

@section('content')
	<div class="uk-section uk-padding-remove-top">
	    <div class="uk-container uk-container-large">
	    	<div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l" uk-grid>
				@each('includes/tagCard', $tags, 'parentTag')
				<div>
					<div class="uk-card uk-card-default uk-padding-remove">
					@include('forms/formNewTag')
					</div>
				</div>
			</div>
	    </div>
    </div>
@stop
