<?php
$comments = $item->comments;
?>

<div>
	<div class="uk-card uk-card-default uk-card-hover">
		<div class="uk-position-small uk-position-right uk-light">
			<a href="/deleteItem/{{ $item->id }}" uk-icon="icon: close; ratio: 0.8"></a>
		</div>
	    <a href="/item/{{ $item->id }}">
			<div class="uk-card-secondary uk-card-header uk-padding-small itemColor">
				<h5 class="uk-margin-remove-bottom">
					<span class="uk-margin-right" uk-icon="icon: warning;"></span><span class="uk-text-bottom">{{ $item->title }}</span>
				</h5>
			</div>
		</a>
		<div class="uk-card-body uk-padding-remove">
			<div class="uk-overflow-auto">
				@if (count($item->teams) > 0)
					<div class="uk-width-1-1 uk-padding-small">
						@foreach($item->teams as $team)
							<span class="uk-label uk-label-warning">{!! $team->name !!}</span>
						@endforeach
					</div>
				@endif
				@if (count($item->tags) > 0)
					<div class="uk-width-1-1 uk-padding-small uk-padding-remove-vertical">
						@foreach($item->tags as $tag)
							<span class="uk-label uk-label-success">{!! $tag->name !!}</span>
						@endforeach
					</div>
				@endif
	        	<ul uk-accordion>
				    <li>
				    	@if (isset($item->description))
							<p class="uk-padding-small">{{ $item->description }}</p>
				        @endif
				        <h3 class="uk-accordion-title uk-padding-small">{!! count($comments) !!} comments</h3>
				        <div class="uk-accordion-content">
				        	<ul class="uk-list">
							    <li>
									<table class="uk-table uk-table-hover uk-table-middle">
								        <tbody>
								        	@include('includes/formNewComment')
								        	@if(count($comments) >= 1)
												@foreach ($comments as $comment)
										            <tr>
										                <td><span uk-icon="icon: comment"></span></td>
										                <td>{!! $comment->description !!}</td>
										            </tr>
												@endforeach
											@endif
								        </tbody>
								    </table>			    	
							    </li>
							</ul>
				        </div>
				    </li>
				</ul>
			</div>
		</div>
	</div>
</div>