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
					<a href="/project/{{ $project->id }}">
					@if (!is_null($project->imageFilename))
						<div class="panel-heading project-icon-heading" style="background-image: url('{!! asset('/uploads/'.$project->imageFilename) !!}'); background-position:center"></div>
					@else
						<div class="panel-heading project-icon-heading" style="background-color: rgb({!! rand(1,255) !!},{!! rand(1,255) !!},{!! rand(1,255) !!});"></div>
					@endif
					</a>
					<div class="panel-body">
						<h3>{{ $project->name }}</h3>
		                <a href="/project/{{ $project->id }}">
		                	<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
		                </a>
		                <a href="/deleteProject/{{ $project->id }}">
		                	<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
		                </a>
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
	
	@if(!empty($sharedProjects))
		@foreach($sharedProjects as $sharedProject)
		    <div class="col-lg-2 col-md-3 col-sm-6 col-centered">
				<div class="panel panel-default panel-profile">
					<a href="/project/{{ $sharedProject->id }}">
					@if (!is_null($sharedProject->imageFilename))
						<div class="panel-heading project-icon-heading" style="background-image: url('{!! asset('/uploads/'.$sharedProject->imageFilename) !!}');"></div>
					@else
						<div class="panel-heading project-icon-heading" style="background-color: rgb({!! rand(1,255) !!},{!! rand(1,255) !!},{!! rand(1,255) !!});"></div>
					@endif
					</a>
					<div class="panel-body">
						<h3>{{ $sharedProject->name }}</h3>
		                <a href="/project/{{ $sharedProject->id }}">
		                	<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
		                </a>
		                <a href="/deleteProject/{{ $sharedProject->id }}">
		                	<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
		                </a>
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
	        {!! BootForm::open(array('url' => 'newProject', 'files'=>true)) !!}
				{!! BootForm::text('name', false) !!}
				{!! BootForm::file('image') !!} 
				{!! BootForm::submit('Create') !!}
			{!! BootForm::close() !!}
	    </div>
	</div>
	
		

@stop