<div class="uk-margin-remove uk-padding-small uk-margin-small-right uk-card-body">
	{!! Form::open(array('url' => 'newComment', 'files'=>true, 'class' => 'uk-form uk-grid-small uk-match-height')) !!}
		{!! Form::hidden('item_id', $item->id) !!}
		{!! Form::textarea('comment', null, array('class' => 'uk-textarea', 'placeholder' => 'Comment...', 'rows' => '2')) !!}
		<div class="uk-upload uk-margin-small" uk-form-custom>
			{!! Form::file('attachements[]', array('id' => 'fileInputField', 'multiple' => "multiple")) !!}
			<input id="imageName" class="uk-input uk-margin-small" type="text" placeholder="Attach files" disabled>
		</div>
		<progress id="progressbar" class="uk-progress uk-margin-remove-top" value="0" max="100" hidden></progress>
		{!! Form::submit('Send', array('class' => 'uk-button uk-width-1-1')) !!}
	{!! Form::close() !!}
</div>