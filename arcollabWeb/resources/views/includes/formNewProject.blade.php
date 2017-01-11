<div class="col-lg-2 col-md-3 col-sm-6 col-centered">
	<h3>New Project</h3>
    {!! BootForm::open(array('url' => 'newProject', 'files'=>true)) !!}
		{!! BootForm::text('name', false) !!}
		{!! BootForm::file('image') !!} 
		{!! BootForm::submit('Create') !!}
	{!! BootForm::close() !!}
</div>