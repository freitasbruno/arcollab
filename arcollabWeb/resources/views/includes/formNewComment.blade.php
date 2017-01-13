<div>
	{!! Form::open(array('url' => 'newComment', 'class' => 'uk-form')) !!}
		{!! Form::hidden('item_id', $item->id) !!}
		{!! Form::textarea('comment', null, array('class' => 'uk-textarea uk-margin-small', 'placeholder' => 'Comment...', 'rows' => '2')) !!}
		{!! Form::submit('Comment', array('class' => 'uk-margin-small uk-button uk-button-default uk-width-1-1')) !!}
	{!! Form::close() !!}
</div>