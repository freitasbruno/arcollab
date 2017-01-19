@extends('layouts.masterBgImage')

@section('header')

@stop

@section('content') 
	<div class="uk-section uk-text-center">
    	<div class="uk-container">
			<div class="uk-card uk-card-default uk-card-hover uk-width-1-4@m uk-position-center">
			    <div class="uk-card-header uk-card-secondary">
			        <h3 class="uk-card-title">REGISTER</h3>
			    </div>
			    <div class="uk-card-body uk-padding-small">
					{!! Form::open(array('url' => 'register', 'class' => 'uk-form')) !!}
						{!! Form::text('name', '', array('class' => 'uk-input uk-margin-small', 'placeholder' => 'User Name')) !!}
						{!! Form::email('email', '', array('class' => 'uk-input uk-margin-small', 'placeholder' => 'Email Address')) !!}
						{!! Form::password('password', array('class' => 'uk-input uk-margin-small', 'placeholder' => 'Password')) !!}
						{!! Form::submit('GO!', array('class' => 'uk-margin-small uk-button uk-button-default uk-width-1-1 uk-button-primary')) !!}
					{!! Form::close() !!}
			    </div>
			    <div class="uk-card-footer">
			        <a href="{{ URL::to('login') }}">Already a user? Login here!</a>
			    </div>
			</div>
	    </div>
	</div>
@stop