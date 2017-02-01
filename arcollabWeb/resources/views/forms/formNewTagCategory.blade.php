<div class="uk-padding-small uk-margin-small-right uk-margin-remove">
	{!! Form::open(array('url' => 'newTagCategory', 'class' => 'uk-form')) !!}
		{!! Form::hidden('project_id', $project->id) !!}
		{!! Form::text('name', null, array('class' => 'uk-input', 'placeholder' => 'Tag Category name')) !!}
		{!! Form::submit('CREATE', array('class' => 'uk-button uk-width-1-1')) !!}
	{!! Form::close() !!}
</div>
