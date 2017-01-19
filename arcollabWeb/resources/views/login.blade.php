@extends('layouts.masterBgImage')

@section('header')

@stop

@section('content')
	<div class="uk-section uk-text-center">
    	<div class="uk-container">
			<div class="uk-card uk-card-default uk-width-1-4@m uk-position-center">
			    <div class="uk-card-header uk-card-secondary">
			        <h3 class="uk-card-title">LOGIN</h3>
			    </div>
			    <div class="uk-card-body uk-padding-small">
					{!! Form::open(array('url' => 'login', 'class' => 'uk-form')) !!}
						{!! Form::email('email', '', array('class' => 'uk-input uk-margin-small', 'placeholder' => 'Email Address')) !!}
						{!! Form::password('password', array('class' => 'uk-input uk-margin-small', 'placeholder' => 'Password')) !!}
						{!! Form::submit('GO!', array('class' => 'uk-margin-small uk-button uk-button-default uk-width-1-1 uk-button-primary')) !!}
					{!! Form::close() !!}
			    </div>
			    <div class="uk-card-footer">
			        <a href="{{ URL::to('register') }}" >Don't have a username? Register here!</a>
			    </div>
			</div>
	    </div>
	</div>
@stop