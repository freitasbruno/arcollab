<div>
	<div class="uk-card uk-card-default uk-card-hover uk-width-1-2@s uk-width-1-3@m uk-align-center uk-margin-large-top">
		<a href="/projects/{{ $project->id }}">
			<div class="uk-card-header project-icon-heading uk-background-cover" style="background-image: url('{!! asset('/uploads/'.$project->imageFilename) !!}');"></div>
		</a>
		<div class="uk-card-body uk-padding-small">
			<a href="/projects/{{ $project->id }}" class="uk-button uk-button-text">
				<h4 class="uk-margin-remove-bottom" style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">{{ $project->name }}</h4>
			</a>
		</div>
		<div class="uk-card-footer uk-padding-small">
			<p class="uk-padding-remove-vertical uk-align-left">
				<span class="uk-label uk-label-warning uk-margin-right">{{ countProjectIssues($project) }}</span>New Issues
				<br>
				<span class="uk-label uk-margin-right">{{ countProjectIssues($project) }}</span>Total Issues
			</p>
		</div>
	</div>
</div>
