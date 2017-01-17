<?php 
$users = User::all();
?>

<div class="uk-margin-small-left uk-margin-small-right uk-card-body">
	{!! Form::open(array('url' => 'addUser', 'class' => 'uk-form')) !!}
		{!! Form::hidden('team_id', $team->id) !!}
		{!! Form::email('email', '', array('class' => 'uk-input uk-margin-small', 'placeholder' => 'Email Address')) !!}
		{!! Form::submit('Add User', array('class' => 'uk-margin-small uk-button uk-button-primary uk-width-1-1')) !!}
	{!! Form::close() !!}
</div>