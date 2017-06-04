<div>
	<div class="uk-card uk-card-default uk-card-hover">
		<div class="uk-card uk-card-header uk-padding-small groupColorLight">
			<h4 class="uk-margin-remove-bottom">
			<span class="uk-margin-right" uk-icon="icon: folder; ratio: 1.3"></span><span class="uk-text-bottom">NEW GROUP</span>
			</h4>
		</div>
		<div class="uk-margin-small-left uk-margin-small-right uk-card-body">
			{!! Form::open(array('url' => 'groups', 'class' => 'uk-form')) !!}
				{!! Form::hidden('project_id', $project->id) !!}
				{!! Form::text('name', false, array('class' => 'uk-input uk-margin-small', 'placeholder' => 'Group Name')) !!}
				{!! Form::textarea('description', false, array('class' => 'uk-textarea uk-margin-small', 'placeholder' => 'Group Description', 'rows' => '2')) !!}
				{!! Form::submit('Create', array('class' => 'uk-margin-small uk-button uk-width-1-1')) !!}
			{!! Form::close() !!}
		</div>
	</div>
</div>
