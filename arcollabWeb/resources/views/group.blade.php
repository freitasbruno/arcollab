@extends('layouts.master')

@section('header')
	@include('includes/groupHeader')
@stop

@section('content') 
	<div class="uk-section uk-padding-remove-top">
	    <div class="uk-container uk-container-large">
	    	<div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l" uk-grid>
				@each('includes/itemCard', $items, 'item')
				@include('includes/formNewItem')
			</div>
	    	<div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l uk-grid-match" uk-grid>
				@each('includes/groupCard', $groups, 'group')	
				@include('includes/formNewGroup')
			</div>
			
			
	    </div>
    </div>
	
@stop