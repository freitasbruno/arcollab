@extends('layouts.master')

@section('header')
	<h1>Welcome to GO Tasks</h1>
	<h3>{{ $theEmail }}</h3>
    <hr>
@stop

@section('content') 
	<div class="spacer40"></div>
	<div class="col-md-4 col-centered text-center">
   		<a href="{{ URL::to('login') }}" class="btn btn-info myBtn">LOGIN</a>
   	</div>
@stop