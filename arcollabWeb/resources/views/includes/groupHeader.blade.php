<div class="uk-section uk-section-small uk-light">
	<div class="uk-container uk-container-large">
		<div class="uk-grid-match uk-grid-small" uk-grid>
		    <div class="uk-width-1-3@m">
	    		<div class="uk-card uk-card-default uk-background-cover" style="background-image: url('{!! asset('/uploads/'.$project->imageFilename) !!}');"></div>
		    </div>
		    <div class="uk-width-expand@m uk-margin-remove-top">
		    	<div class="uk-card uk-card-default uk-padding-small uk-background-secondary uk-light">
			    	<a href="/project/{{ $project->id }}" class="uk-button uk-button-text"><h3 class="uk-margin-remove-bottom">{!! $project->name !!}</h3></a>
			        <p>{!! $project->description !!}</p>
			        
			        <h4>{!! $group->name !!}</h4>
        			<p>{!! $group->description !!}</p>
        			
					<div uk-grid>
					    <div class="uk-width-1-4@m">
					    	<ul class="uk-nav-default uk-parent uk-nav-parent-icon" uk-nav>
					        	<li class="uk-parent"><a href="#">EDIT</a>
					        		<ul class="uk-nav-sub"><li class="uk-parent">
					        			<li><a href="#"><span class="uk-margin-small-right" uk-icon="icon: pencil"></span> Edit project information</a></li>
							        	<li><a href="/deleteProject/{{ $project->id }}"><span class="uk-margin-small-right" uk-icon="icon: trash"></span> Delete project</a></li>
						        	</ul>
					        	</li>
					        </ul>
					        <ul class="uk-nav-default uk-parent uk-nav-parent-icon" uk-nav>
					        	<li class="uk-parent"><a href="#">GROUPS</a>
					        		<ul class="uk-nav-sub"><li class="uk-parent">
					        			<li><a href="/project/{{ $project->id }}">ALL GROUPS</a></li>
							        	@foreach($groups as $group)
							        		<li><a href="/group/{{ $group->id }}"><span class="uk-margin-small-right" uk-icon="icon: users"></span> {!! $group->name !!}</a></li>
							        	@endforeach
						        	</ul>
					        	</li>
					        </ul>
				   		</div>
					</div>
				</div>
		    </div>
		</div>
	</div>
</div>