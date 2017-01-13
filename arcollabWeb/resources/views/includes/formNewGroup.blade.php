<div>
	<div class="uk-card uk-card-default uk-card-hover">
		<div class="uk-card-header uk-card-primary uk-text-center">
			<h3><span class="uk-margin-right" uk-icon="icon: folder; ratio: 1.5"></span>New Group</h3>
		</div>
		<div class="uk-margin-small-left uk-margin-small-right uk-card-body">
			{!! Form::open(array('url' => 'newGroup', 'class' => 'uk-form')) !!}
				{!! Form::hidden('project_id', $project->id) !!}
				{!! Form::text('name', false, array('class' => 'uk-input uk-margin-small', 'placeholder' => 'Group Name')) !!}
				{!! Form::textarea('description', false, array('class' => 'uk-textarea uk-margin-small', 'placeholder' => 'Project Description', 'rows' => '2')) !!}
				{!! Form::submit('Create', array('class' => 'uk-margin-small uk-button uk-button-default uk-width-1-1')) !!}
			{!! Form::close() !!}
		</div>
	</div>
</div>