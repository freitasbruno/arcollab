@extends('layouts.master')

@section('header')

	<h1>
    	TEAMS
    </h1>
    
@stop

@section('content')

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
	
	<div class="row row-centered">
	    <div class="col-lg-2 col-md-3 col-sm-6 col-centered">
	    	<h3>New Team</h3>
	    	{!! BootForm::open(array('url' => 'newTeam')) !!}
				{!! BootForm::text('name') !!}
				{!! BootForm::submit('Create') !!}
			{!! BootForm::close() !!}
	    </div>
	</div>
	
		

@stop