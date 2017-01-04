@extends('layouts.master')

@section('header')

	<!-- Jumbotron Header -->
    <header class="jumbotron hero-spacer">
        <h1>{!! $project->name !!}</h1>
        <p>{!! $project->description !!}</p>
        <p><a class="btn btn-primary btn-large">Call to action!</a></p>
    </header>
    
@stop

@section('content') 

	@if(!empty($groups))
		@foreach($groups as $group)
			<div class="col-lg-3 col-md-4 col-sm-6 col-centered hero-feature">
		        <div class="thumbnail">
		            <img src="http://placehold.it/800x500" alt="">
		            <div class="caption">
		                <h3>{{ $group->name }}</h3>
		            </div>
		        </div>
		    </div>
		@endforeach
	@endif
	
	<div class="col-lg-2 col-md-3 col-sm-6 col-centered hero-feature">
        <div class="thumbnail">
            <div class="caption">
            	<h3>New Group</h3>
            	{!! BootForm::open(array('url' => 'newGroup')) !!}
					{!! BootForm::hidden('project_id', $project->id) !!}
					{!! BootForm::text('name', false) !!}
					{!! BootForm::submit('Create') !!}
				{!! BootForm::close() !!}
            </div>
        </div>
    </div>
	
@stop