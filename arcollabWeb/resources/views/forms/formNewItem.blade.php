<div>
	<div class="uk-card uk-card-default uk-card-hover">
		<div class="uk-card-primary uk-card-header uk-padding-small itemColorLight">
			<h5 class="uk-margin-remove-bottom">
			<span class="uk-margin-right" uk-icon="icon: warning"></span><span class="uk-text-bottom">NEW ITEM</span>
			</h5>
		</div>
		<div class="uk-margin-small-left uk-margin-small-right uk-padding-small uk-card-body">
			{!! Form::open(array('url' => 'newItem', 'class' => 'uk-form-stacked')) !!}
				{!! Form::hidden('group_id', $group->id) !!}
				{!! Form::text('title', false, array('class' => 'uk-input uk-margin-small', 'placeholder' => 'Item Title')) !!}
				{!! Form::textarea('description', false, array('class' => 'uk-textarea uk-margin-small', 'placeholder' => 'Item Description', 'rows' => '2')) !!}
				<div class="uk-width-1-1 uk-margin-top uk-margin-bottom">
					<ul class="uk-nav-default uk-nav-parent-icon" uk-nav="multiple: true">
						<li class="uk-parent">
				            <a href="#"><span uk-icon="icon: users"></span> ASSIGN TEAMS</a>
				            <ul class="uk-nav-sub">
				            	@foreach ($teams as $team)
									<li><label><input class="uk-checkbox" type="checkbox" name="{!! $team->name !!}">{!! $team->name !!}</label></li>
									@if(count($team->teams) > 0)
									<ul>
										@foreach ($team->teams as $nestedTeam)
											<li><label><input class="uk-checkbox" type="checkbox" name="{!! $nestedTeam->name !!}">{!! $nestedTeam->name !!}</label></li>
										@endforeach
									</ul>
									@endif
								@endforeach
				            </ul>
				        </li>
				        <li class="uk-parent">
				            <a href="#"><span uk-icon="icon: tag"></span> ADD TAGS</a>
				            <ul class="uk-nav-sub">
				            	@foreach ($tagCategories as $tagCategory)
									<li><label><input class="uk-checkbox" type="checkbox" name="{!! $tag->name !!}">{!! $tagCategory->name !!}</label></li>
									@if(count($tagCategory->tags) > 0)
									<ul>
										@foreach ($tagCategory->tags as $tag)
											<li><label><input class="uk-checkbox" type="checkbox" name="{!! $nestedTag->name !!}">{!! $tag->name !!}</label></li>
										@endforeach
									</ul>
									@endif
								@endforeach
				            </ul>
				        </li>
			        </ul>
				</div>
				{!! Form::submit('Create', array('class' => 'uk-margin-small uk-button uk-width-1-1')) !!}
			{!! Form::close() !!}
		</div>
	</div>
</div>
