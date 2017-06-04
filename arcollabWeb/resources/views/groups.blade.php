@extends('layouts.master')

@section('header')
	@include('includes/projectHeader')
@stop

@section('content')
	<div class="uk-section uk-padding-remove-top">
	    <div class="uk-container uk-container-large">
	    	<h3 class="uk-heading-line"><span>GROUPS</span></h3>
			<ul class="uk-grid-medium uk-child-width-1-2 uk-child-width-1-4@s" uk-sortable="handle: .uk-card" uk-grid>
				@each('includes/groupCard', $groups, 'group')
				<li class="uk-sortable-nodrag">
					@include('forms/formNewGroup')
				</li>
			</ul>
	    </div>
    </div>
@stop
