<div>
	{!! Form::open(array('url' => 'newProject', 'files'=>true, 'class' => 'uk-form', 'id' => 'newProjectForm')) !!}
	<div class="uk-card uk-card-default uk-width-1-2@s uk-width-1-3@m uk-align-center uk-margin-large-top uk-animation-scale-up uk-transform-origin-bottom-center uk-card-hover">
		<div class="uk-card-header project-icon-heading uk-background-cover" style="background-image: url('{!! asset('/images/newProject.jpg') !!}');"></div>
	    <div class="uk-card-body">
				{!! Form::text('name', false, array('class' => 'uk-input uk-margin-small uk-form-large uk-form-blank', 'placeholder' => 'Project Name')) !!}
				{!! Form::textarea('description', false, array('class' => 'uk-textarea uk-margin-small uk-form-large uk-form-blank', 'placeholder' => 'Enter a description for you project', 'rows' => '2')) !!}
				<div class="uk-upload uk-margin-small" uk-form-custom>
					{!! Form::file('image', array('id' => 'fileInputField')) !!}
					<button class="uk-button uk-button-default uk-button-large" type="button" tabindex="-1">UPLOAD AN IMAGE</button>
					<!--<input id="imageName" class="uk-input uk-margin-small uk-form-large" type="text" placeholder="Select file" disabled>-->
				</div>
				<progress id="progressbar" class="uk-progress" value="0" max="100" hidden></progress>
	    </div>
	    <div class="uk-card-footer">
	        {!! Form::submit('New Project', array('class' => 'uk-margin-small uk-button uk-button-primary uk-width-1-1 uk-button-large')) !!}
	    </div>
	</div>
	{!! Form::close() !!}
</div>
