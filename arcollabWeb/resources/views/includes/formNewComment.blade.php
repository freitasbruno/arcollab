<div class="uk-margin-remove uk-padding-small uk-margin-small-right uk-card-body">
	{!! Form::open(array('url' => 'newComment', 'class' => 'uk-form uk-grid-small uk-match-height')) !!}
		{!! Form::hidden('item_id', $item->id) !!}
		{!! Form::textarea('comment', null, array('class' => 'uk-textarea', 'placeholder' => 'Comment...', 'rows' => '2')) !!}
		{!! Form::submit('Send', array('class' => 'uk-button uk-width-1-1')) !!}
	{!! Form::close() !!}
</div>