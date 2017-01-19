<?php
$childGroups = $group->groups;
$items = $group->items;
?>

<div>
	<div class="uk-card uk-card-default uk-card-hover">
		<div class="uk-position-small uk-position-right uk-light">
			<a href="/deleteGroup/{{ $group->id }}" uk-icon="icon: close; ratio: 0.8"></a>
		</div>
	    <a href="/group/{{ $group->id }}" class="uk-link-reset">
			<div class="uk-card-secondary uk-card-header uk-padding-small groupColor">
				
		   		<h4 class="uk-margin-remove-vertical">
				<span class="uk-margin-right" uk-icon="icon: folder; ratio: 1.3"></span><span class="uk-text-bottom">{{ $group->name }}</span>
				</h4>
			</div>
		</a>
		<div class="uk-card-body uk-padding-remove">
			@if(count($childGroups) >= 1)
			<div class="uk-overflow-auto">
			    <table class="uk-table uk-table-hover uk-table-middle">
			        <tbody>
						@foreach ($childGroups as $childGroup)
				            <tr>
				                <td><span uk-icon="icon: folder"></span></td>
				                <td class="uk-table-link uk-text-left"><a class="uk-link-reset" href="/group/{{ $childGroup->id }}">{!! $childGroup->name !!}</a></td>
				            </tr>
						@endforeach	            
				    </tbody>
				</table>
			</div>
			@endif
				
			<div class="uk-overflow-auto">
				<ul uk-accordion>
					@if(count($items) >= 1)
				    <li>
				        <h3 class="uk-accordion-title uk-padding-small">{!! count($items)!!} ISSUES</h3>
				        <div class="uk-accordion-content">
				        	<ul class="uk-list">
							    <li>
									<table class="uk-table uk-table-hover uk-table-middle">
								        <tbody>
											@foreach ($items as $item)
									            <tr>
									                <td><span uk-icon="icon: warning"></span></td>
									                <td class="uk-table-link">
									                    <a class="uk-link-reset" href="/item/{{ $item->id }}">{!! $item->title !!}</a>
									                </td>
									            </tr>
											@endforeach
								        </tbody>
								    </table>			    	
							    </li>
							</ul>
				        </div>
				    </li>
				    @else
				    	<li><h4 class="uk-padding-small uk-margin-remove-bottom">NO ISSUES</h4></li>
				    @endif
				</ul>
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
</div>