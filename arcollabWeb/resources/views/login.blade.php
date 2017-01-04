@extends('layouts.master')

@section('header')
	<h1>LOGIN</h1>
@stop

@section('content') 
	<div class="spacer40"></div>
	<div class="col-md-4 col-centered">
		{!! BootForm::open(array('url' => 'login')) !!}
			{!! csrf_field() !!}
			{!! BootForm::email() !!}
			{!! BootForm::password() !!}
			<div class="spacer20"></div>
			{!! BootForm::submit('Login') !!}
		{!! BootForm::close() !!}
	</div>	
	<div class="spacer40"></div>
    <h4 class="text-center"><a href="{{ URL::to('register') }}" >Don't have a username? Register here!</a></h4>
	<div class="spacer60"></div>
@stop