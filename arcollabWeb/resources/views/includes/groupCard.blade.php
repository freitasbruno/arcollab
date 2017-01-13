<?php
$childGroups = $group->groups;
$items = $group->items;
?>

<div>
	<div class="uk-card uk-card-default uk-card-hover">
	    <a href="/group/{{ $group->id }}">
			<div class="uk-card-secondary uk-card-header uk-text-center">
				<h3><span class="uk-margin-right" uk-icon="icon: folder; ratio: 1.5"></span>{{ $group->name }}</h3>
				<p>{{ $group->description }}</p>
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
			
			@if(count($items) >= 1)
			<div class="uk-overflow-auto">
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
			</div>
			@endif
			
	        <a href="/group/{{ $group->id }}" uk-icon="icon: pencil"></a>
	        <a href="/deleteGroup/{{ $group->id }}" uk-icon="icon: trash"></a>
		</div>
		<div class="uk-card-footer">
			<ul class="uk-list uk-list-divider">
			  	<li>
			    	<span class="uk-badge">14</span>
			    	PROJECT ISSUES
			  	</li>
			  	<li>
			    	<span class="uk-badge">5</span>
			    	PENDING ISSUES
			  	</li>
			</ul>
		</div>
	</div>
</div>