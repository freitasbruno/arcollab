<div>
	<div class="uk-card uk-card-default uk-card-hover">
	    <a href="/project/{{ $project->id }}">
		@if (!is_null($project->imageFilename))
			<div class="uk-card-header project-icon-heading uk-background-cover" style="background-image: url('{!! asset('/uploads/'.$project->imageFilename) !!}');"></div>
		@else
			<div class="uk-card-header project-icon-heading" style="background-color: rgb({!! rand(1,255) !!},{!! rand(1,255) !!},{!! rand(1,255) !!});"></div>
		@endif
		</a>
		<div class="uk-card-body">
			<h3>{{ $project->name }}</h3>
			<p>{{ $project->description }}</p>
	        <a href="/project/{{ $project->id }}" uk-icon="icon: pencil"></a>
	        <a href="/deleteProject/{{ $project->id }}" uk-icon="icon: trash"></a>
		</div>
	</div>
</div>