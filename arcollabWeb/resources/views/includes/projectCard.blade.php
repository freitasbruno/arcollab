<div>
	<div class="uk-card uk-card-default uk-card-hover">
		<a href="/project/{{ $project->id }}">
			<div class="uk-card-header project-icon-heading uk-background-cover" style="background-image: url('{!! asset('/uploads/'.$project->imageFilename) !!}');"></div>
		</a>
		<div class="uk-card-body uk-padding-small">
			<a href="/project/{{ $project->id }}" class="uk-button uk-button-text">
				<h4 class="uk-margin-remove-bottom" style="text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">{{ $project->name }}</h4>
			</a>
		</div>
		<div class="uk-card-footer uk-padding-small">	
			<p class="uk-padding-remove-vertical">
				<span class="uk-badge uk-margin-right">{{ countProjectGroups($project) }}</span>Project Groups
				<br>
				<span class="uk-badge uk-margin-right">{{ countProjectIssues($project) }}</span>Project Issues
			</p>
		</div>
	</div>
</div>