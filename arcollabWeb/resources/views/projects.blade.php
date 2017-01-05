@extends('layouts.master')

@section('header')

	<h1>
    	PROJECTS
    </h1>
    
@stop

@section('content')

	@if(!empty($projects))
		@foreach($projects as $project)
		    <div class="col-lg-2 col-md-3 col-sm-6 col-centered">
				<div class="panel panel-default panel-profile">
					<div class="panel-heading project-icon-heading" style="background-image: url('{!! asset('/images/projPlaceholder.jpg') !!}');">
						<h3 style="margin-top:75px; padding:10px; background-color:rgba(255, 255, 255, 0.5)">{{ $project->name }}</h3>
					</div>
					<div class="panel-body text-center">
						<h5 class="panel-title">LONDON, UK</h5>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
						<a href="/project/{{ $project->id }}" class="btn btn-primary">OPEN</a>
		                <a href="/deleteProject/{{ $project->id }}" class="btn btn-default">Delete</a>
					</div>
				</div>
				<ul class="list-group">
				  	<li class="list-group-item">
				    	<span class="badge">14</span>
				    	PROJECT ISSUES
				  	</li>
				  	<li class="list-group-item">
				    	<span class="badge">5</span>
				    	PENDING ISSUES
				  	</li>
				</ul>
		    </div>
		@endforeach
	@endif
	
	<div class="row row-centered">
		<div class="col-lg-2 col-md-3 col-sm-6 col-centered">
	    	<h3>New Project</h3>
	        {!! BootForm::open(array('url' => 'newProject')) !!}
				{!! BootForm::text('name', false) !!}
				<!-- {!! Form::file('image') !!} -->
				{!! BootForm::submit('Create') !!}
			{!! BootForm::close() !!}
	    </div>		
	</div>
	
@stop