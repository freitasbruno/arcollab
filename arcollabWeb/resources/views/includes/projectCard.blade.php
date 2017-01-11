<div class="col-lg-2 col-md-3 col-sm-6 col-centered">
    <div class="uk-card uk-card-default">
        <a href="/project/{{ $project->id }}">
		@if (!is_null($project->imageFilename))
			<div class="uk-card-header project-icon-heading" style="background-image: url('{!! asset('/uploads/'.$project->imageFilename) !!}'); background-position:center"></div>
		@else
			<div class="uk-card-header project-icon-heading" style="background-color: rgb({!! rand(1,255) !!},{!! rand(1,255) !!},{!! rand(1,255) !!});"></div>
		@endif
		</a>
		<div class="panel-body">
			<h3>{{ $project->name }}</h3>
            <a href="/project/{{ $project->id }}">
            	<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            </a>
            <a href="/deleteProject/{{ $project->id }}">
            	<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
            </a>
		</div>
    </div>
</div>