<?php 
$users = User::all();
$teamUsers = $team->users;
?>

@extends('layouts.master')

@section('header')

	<!-- Jumbotron Header -->
    <header class="jumbotron hero-spacer">
        <h1>{!! $team->name !!}</h1>
        <p>{!! $team->description !!}</p>
        <p><a class="btn btn-primary btn-large">Call to action!</a></p>
    </header>
    
@stop

@section('content') 
	<div class="col-lg-3 col-md-4 col-sm-6 col-centered">
	
	@if(!empty($teamUsers))
		@foreach($teamUsers as $teamUser)
			<p>{{ $teamUser->name }}</p>
			<p>{{ $teamUser->email }}</p>
		@endforeach
	@endif
		
	{!! BootForm::open(array('url' => 'addUser')) !!}
		{!! BootForm::hidden('team_id', $team->id) !!}
		<select class="form-control" name="user">
			@foreach($users as $user)
		    	<option value="{{ $user->id }}">{{ $user->name }}</option>
		    @endforeach
		</select>
		{!! BootForm::submit('Add User') !!}
	{!! BootForm::close() !!}
	</div>
	
	@if(!empty($teams))
		@foreach($teams as $childTeam)
			<div class="col-lg-3 col-md-4 col-sm-6 col-centered">
				<div class="panel panel-default panel-profile">
					<div class="panel-heading"><h3>{{ $childTeam->name }}</h3></div>
					<div class="panel-body text-center">
						<p>{{ $childTeam->description }}</p>
						<a href="/team/{{ $childTeam->id }}" class="btn btn-primary">OPEN</a>
		                <a href="/deleteTeam/{{ $childTeam->id }}" class="btn btn-default">Delete</a>
					</div>
					
				</div>
		    </div>
		@endforeach
	@endif
	
	<div class="col-lg-2 col-md-3 col-sm-6 col-centered">
    	<h3>New Team</h3>
    	{!! BootForm::open(array('url' => 'newTeam')) !!}
    		{!! BootForm::hidden('team_id', $team->id) !!}
			{!! BootForm::text('name') !!}
			{!! Form::textarea('description', null, ['rows' => '5']) !!}
			{!! BootForm::submit('Create') !!}
		{!! BootForm::close() !!}
    </div>
	
@stop