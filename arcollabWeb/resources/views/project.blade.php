@extends('layouts.master')

@section('header')
	@include('includes/projectHeader')
@stop

@section('content')
	<div class="uk-section uk-padding-remove-top">
	    <div class="uk-container uk-container-large">
	    	<h3 class="uk-heading-line"><span>ISSUES</span></h3>
	    	<div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l" uk-grid>
				@each('includes/itemCard', $items, 'item')
			</div>
	    </div>
    </div>

	@include('forms/formModal')

@stop
