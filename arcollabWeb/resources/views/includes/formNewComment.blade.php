<div class="uk-margin-small-left uk-margin-small-right uk-card-body">
	{!! Form::open(array('url' => 'newComment', 'class' => 'uk-form')) !!}
		{!! Form::hidden('item_id', $item->id) !!}
		{!! Form::textarea('comment', null, array('class' => 'uk-textarea uk-margin-small', 'placeholder' => 'Comment...', 'rows' => '2')) !!}
		{!! Form::submit('Comment', array('class' => 'uk-margin-small uk-button uk-button-primary uk-width-1-1')) !!}
	{!! Form::close() !!}
</div>