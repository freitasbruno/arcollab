<div>
	<div class="uk-card uk-card-default uk-card-hover">
		<div class="uk-card-header">
			<!--
			{!! Form::open(array('url' => 'newProject', 'files'=>true, 'class' => 'uk-form')) !!}
			<div class="test-upload uk-placeholder uk-text-center">
				<span uk-icon="icon: cloud-upload"></span>
			    <span class="uk-text-middle">Attach binaries by dropping them here or</span>
			    <div uk-form-custom>
			        <input type="file" multiple>
			        <span class="uk-link">selecting one</span>
			    </div>
			</div>
		    {!! Form::text('name', false, array('class' => 'uk-input uk-margin-small', 'placeholder' => 'Project Name')) !!}
		    {!! Form::submit('Create', array('class' => 'uk-margin-small uk-button uk-button-default')) !!}
		    
		    {!! Form::close() !!}
			<progress id="progressbar" class="uk-progress" value="0" max="100" hidden></progress>
			-->
			<h3>New Project</h3>
		</div>
		<div class="uk-margin-small-left uk-margin-small-right uk-card-body">
		{!! Form::open(array('url' => 'newProject', 'files'=>true, 'class' => 'uk-form')) !!}
			{!! Form::text('name', false, array('class' => 'uk-input uk-margin-small', 'placeholder' => 'Project Name')) !!}
			{!! Form::textarea('description', false, array('class' => 'uk-textarea uk-margin-small', 'placeholder' => 'Project Description', 'rows' => '2')) !!}
			<div class="uk-upload uk-margin-small" uk-form-custom>
				{!! Form::file('image') !!}
				<input class="uk-input uk-margin-small" type="text" placeholder="Select file" disabled>
			</div>
			<!--
			<div id="upload-alert" class="uk-alert-success" uk-alert>
			    <p>Upload OK</p>
			</div>-->
			{!! Form::submit('Create', array('class' => 'uk-margin-small uk-button uk-button-default')) !!}
		{!! Form::close() !!}
	</div>
</div>