<div class="uk-section uk-section-small uk-light">
	<div class="uk-container uk-container-large">
		<div class="uk-grid-match uk-grid-small" uk-grid>
		    <div class="uk-width-1-3@m">
	    		<div class="uk-card uk-card-default uk-background-cover" style="background-image: url('{!! asset('/uploads/'.$project->imageFilename) !!}');"></div>
		    </div>
		    <div class="uk-width-expand@m uk-margin-remove-top project-header">
		    	<div class="uk-card uk-card-default uk-padding-small uk-background-secondary uk-light">
		    		<div class="uk-margin-remove-bottom">
			    		<a href="/projects/{{ $project->id }}" class="uk-button uk-button-text uk-text-uppercase uk-text-large">{!! $project->name !!}</a>
			    		@if (isset($team))
			    			<span uk-icon="icon: chevron-right"></span>
			    			<a href="/teams/{{ $project->id }}" class="uk-button uk-button-text uk-text-uppercase uk-text-large">TEAMS</a>
			    			<span uk-icon="icon: chevron-right"></span>
			    			<a href="/team/{{ $team->id }}" class="uk-button uk-button-text uk-text-uppercase uk-text-large">{!! $team->name !!}</a>
			    		@endif
			    		@if (isset($item))
			    			<span uk-icon="icon: chevron-right"></span>
			    			<a href="/item/{{ $item->id }}" class="uk-button uk-button-text uk-text-uppercase uk-text-large">{!! $item->title !!}</a>
			    		@else
				    		<p>{!! $project->description !!}</p>
			    		@endif
			    	</div>
			        <ul class="uk-subnav uk-subnav-divider uk-text-bold uk-position-small uk-position-bottom-left" uk-margin>
					    <li class="uk-padding-remove-horizontal">
							<a href="/groups/{{ $project->id }}"></span>GROUPS</a>
							<a href="#modal-formNewGroup" uk-toggle uk-icon="icon: plus-circle; ratio: 0.8" class="uk-margin-left"></a>
						</li>
						<li>
							<a href="/projects/{{ $project->id }}"></span>ISSUES</a>
							<a href="#modal-formNewItem" uk-toggle uk-icon="icon: plus-circle; ratio: 0.8" class="uk-margin-left"></a>
						</li>
						<li>
							<a href="#">DOCUMENTS</a>
						</li>
					</ul>
					<ul class="uk-subnav uk-subnav-divider uk-text-bold uk-position-small uk-position-bottom-right" uk-margin>
					    <li><a href="/tags/{{ $project->id }}">TAGS</a></li>
					    <li><a href="/teams/{{ $project->id }}">TEAMS</a></li>
					</ul>

			        <div uk-grid>
					    <div class="uk-position-small uk-position-top-right">
					    	<ul class="uk-iconnav">
					        	<li><a href="" uk-icon="icon: pencil"></a></li>
					        	<li><a href="{{ route('project.delete', $project->id) }}" uk-icon="icon: trash"></a></li>
					        </ul>
				   		</div>
					</div>
				</div>
		    </div>
		</div>
	</div>
</div>
