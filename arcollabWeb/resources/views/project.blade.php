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
			<div class="col-lg-3 col-md-4 col-sm-6 col-centered">
				<div class="panel panel-default panel-profile">
					<div class="panel-heading"><h3>{{ $group->name }}</h3></div>
					<div class="panel-body text-center">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
						<a href="/group/{{ $group->id }}" class="btn btn-primary">OPEN</a>
		                <a href="/deleteGroup/{{ $group->id }}" class="btn btn-default">Delete</a>
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
		    </div>
		@endforeach
	@endif
	
	@if(!empty($teams))
		@foreach($teams as $team)
		    <div class="col-lg-2 col-md-3 col-sm-6 col-centered">
				<div class="panel panel-default panel-profile">
					<a href="/team/{{ $team->id }}">
					<div class="panel-heading project-icon-heading" style="background-color: rgb({!! rand(1,255) !!},{!! rand(1,255) !!},{!! rand(1,255) !!});"></div>
					</a>
					<div class="panel-body">
						<h3>{{ $team->name }}</h3>
		                <a href="/team/{{ $team->id }}">
		                	<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
		                </a>
		                <a href="/deleteTeam/{{ $team->id }}">
		                	<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
		                </a>
					</div>
				</div>
		    </div>
		@endforeach
	@endif
	
	<div class="col-lg-2 col-md-3 col-sm-6 col-centered">
    	<h3>New Group</h3>
    	{!! BootForm::open(array('url' => 'newGroup')) !!}
			{!! BootForm::hidden('project_id', $project->id) !!}
			{!! BootForm::text('name') !!}
			{!! Form::textarea('description', null, ['rows' => '5']) !!}
			{!! BootForm::submit('Create') !!}
		{!! BootForm::close() !!}
    </div>
    <div class="col-lg-2 col-md-3 col-sm-6 col-centered">
    	<h3>New Team</h3>
    	{!! BootForm::open(array('url' => 'newTeam')) !!}
    		{!! BootForm::hidden('project_id', $project->id) !!}
			{!! BootForm::text('name') !!}
			{!! Form::textarea('description', null, ['rows' => '5']) !!}
			{!! BootForm::submit('Create') !!}
		{!! BootForm::close() !!}
    </div>
	
@stop