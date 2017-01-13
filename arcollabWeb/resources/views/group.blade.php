@extends('layouts.master')

@section('header')

	<div class="uk-section uk-section-large uk-section-media uk-light uk-background-cover" style="background-image: url('{!! asset('/uploads/'.$project->imageFilename) !!}');">
    	<div class="uk-container uk-container-expand uk-text-center">
    		<div>
	    		<h1>{!! $project->name !!}</h1>
		        <h3>{!! $group->name !!}</h3>
        		<p>{!! $group->description !!}</p>
    		</div>
    	</div>
    </div>
    
@stop

@section('content') 
	<div class="uk-section">
	    <div class="uk-container uk-container-large">
	    	<div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l uk-grid-match" uk-grid>
				@each('includes/groupCard', $groups, 'group')	
				@include('includes/formNewGroup')
			</div>
			
			<div class="uk-child-width-1-2@s uk-child-width-1-4@m uk-child-width-1-5@l uk-grid-match" uk-grid>
				@each('includes/itemCard', $items, 'item')
				@include('includes/formNewItem')
			</div>
	    </div>
    </div>
	
@stop