<?php
$items = $group->items;
?>
<li>
	<div class="uk-card uk-card-default uk-card-hover uk-margin-bottom toggleWrapper">
		<div class="uk-position-small uk-position-right uk-light">
			<a href="#" uk-icon="icon: minus-circle; ratio: 0.8" class="toggleBtn"></a>
			<a href="/deleteGroup/{{ $group->id }}" uk-icon="icon: close; ratio: 0.8"></a>
		</div>
	    <a href="/group/{{ $group->id }}" class="uk-link-reset">
			<div class="uk-card-secondary uk-card-header uk-padding-small groupColor">
		   		<h4 class="uk-margin-remove-vertical">
				<span class="uk-margin-right" uk-icon="icon: folder; ratio: 1.3"></span><span class="uk-text-bottom">{{ $group->name }}</span>
				</h4>
			</div>
		</a>
		<div class="uk-card-body uk-padding-small toggleContent">
			<div uk-sortable="group: sortable-item">
				@foreach ($items as $item)
	            <div class="uk-card uk-card-hover uk-margin-small">
					<a class="uk-link-reset" href="/items/{{ $item->id }}">
		                <div class="uk-card uk-card-default uk-card-body uk-card-small">
							<span uk-icon="icon: warning" class="uk-margin-small-right"></span>{!! $item->title !!}
						</div>
					</a>
	            </div>
				@endforeach
	        </div>
		</div>
		<div class="uk-card-footer uk-padding-small">
			<p class="uk-padding-remove-vertical">
				<span class="uk-badge uk-margin-right">{{ countGroupIssues($group) }}</span>Group Issues
				<br>
				<span class="uk-badge uk-margin-right">{{ countGroupIssues($group) }}</span>Unread Issues
			</p>
		</div>
	</div>
</li>
