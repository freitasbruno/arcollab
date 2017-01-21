@extends('layouts.master')

@section('header')

@stop

@section('content') 
	<div>
		<div class="uk-card uk-card-default uk-card-hover">
			<div class="uk-card-body uk-margin-small">
				{!! Form::open(array('url' => 'uploadMultiple', 'files'=>true, 'class' => 'uk-form', 'id' => 'newProjectForm')) !!}
					{!! Form::text('name', false, array('class' => 'uk-input uk-margin-small', 'placeholder' => 'Project Name')) !!}
					{!! Form::textarea('description', false, array('class' => 'uk-textarea uk-margin-small', 'placeholder' => 'Project Description', 'rows' => '2')) !!}
					<div class="uk-upload uk-margin-small" uk-form-custom>
						{!! Form::file('attachements[]', array('id' => 'fileInputField', 'multiple' => "multiple")) !!}
						<input id="imageName" class="uk-input uk-margin-small" type="text" placeholder="Select file" disabled>
					</div>
					<progress id="progressbar" class="uk-progress uk-margin-remove-top" value="0" max="100" hidden></progress>
					{!! Form::submit('New Project', array('class' => 'uk-margin-small uk-button uk-button-primary uk-width-1-1')) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@stop