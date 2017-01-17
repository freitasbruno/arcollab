<div>
	<div class="uk-card uk-card-default uk-card-hover">
		<div class="uk-card-header uk-card-primary uk-text-center">
			<h3><span class="uk-margin-right" uk-icon="icon: folder; ratio: 1.5"></span>New Item</h3>
		</div>
		<div class="uk-margin-small-left uk-margin-small-right uk-card-body">
			{!! Form::open(array('url' => 'newItem', 'class' => 'uk-form')) !!}
				{!! Form::hidden('group_id', $group->id) !!}
				{!! Form::text('title', false, array('class' => 'uk-input uk-margin-small', 'placeholder' => 'Item Title')) !!}
				{!! Form::textarea('description', false, array('class' => 'uk-textarea uk-margin-small', 'placeholder' => 'Item Description', 'rows' => '2')) !!}
				{!! Form::submit('Create', array('class' => 'uk-margin-small uk-button uk-button-default uk-width-1-1')) !!}
			{!! Form::close() !!}
		</div>
	</div>
</div>