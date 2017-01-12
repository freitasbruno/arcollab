<div>
	<div class="uk-card uk-card-default uk-card-hover">
    	<h3>New Team</h3>
    	{!! BootForm::open(array('url' => 'newTeam')) !!}
    		{!! BootForm::hidden('project_id', $project->id) !!}
			{!! BootForm::text('name') !!}
			{!! Form::textarea('description', null, ['rows' => '5']) !!}
			{!! BootForm::submit('Create') !!}
		{!! BootForm::close() !!}
	</div>
</div>