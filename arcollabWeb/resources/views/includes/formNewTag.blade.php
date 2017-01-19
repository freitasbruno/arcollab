<div class="uk-margin-remove uk-padding-small uk-margin-small-right uk-card-body">
	{!! Form::open(array('url' => 'newTag', 'class' => 'uk-form uk-grid-small')) !!}
		@if (isset($project))
		{!! Form::hidden('project_id', $project->id) !!}
		@elseif (isset($tag))
			{!! Form::hidden('tag_id', $tag->id) !!}
		@endif
		{!! Form::text('name', null, array('class' => 'uk-input', 'placeholder' => 'Tag name')) !!}
		{!! Form::submit('CREATE', array('class' => 'uk-button uk-button-default uk-width-1-1')) !!}
	{!! Form::close() !!}
</div>