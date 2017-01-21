<div class="uk-padding-small uk-margin-small-right uk-margin-remove">
	{!! Form::open(array('url' => 'newTag', 'class' => 'uk-form')) !!}
		@if (isset($project))
			{!! Form::hidden('project_id', $project->id) !!}
		@elseif (isset($tag))
			{!! Form::hidden('tag_id', $tag->id) !!}
		@endif
		{!! Form::text('name', null, array('class' => 'uk-input', 'placeholder' => 'Tag name')) !!}
		{!! Form::submit('CREATE', array('class' => 'uk-button uk-width-1-1')) !!}
	{!! Form::close() !!}
</div>