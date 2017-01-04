@extends('layouts.master')

@section('header')
	<h1>REGISTER</h1>
@stop

@section('content') 
	<div class="spacer40"></div>
	<div class="col-md-4 col-centered">
		{!! BootForm::open(array('url' => 'register')) !!}
			{!! BootForm::text('name') !!}
			{!! BootForm::email() !!}
			{!! BootForm::password() !!}
			<div class="spacer20"></div>
			{!! BootForm::submit('Register') !!}
		{!! BootForm::close() !!}
	</div>
	<div class="spacer40"></div>
	<div class="text-center">
    	<h4><a href="{{ URL::to('login') }}">Already a user? Login here!</a></h4>
    </div>

@stop