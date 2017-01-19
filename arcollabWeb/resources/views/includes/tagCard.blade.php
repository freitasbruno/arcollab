<?php
$nestedTags = $tag->tags;
?>

<div>
	<div class="uk-card uk-card-default uk-card-hover">
		<div class="uk-position-small uk-position-right uk-light">
			<a href="/deleteTag/{{ $tag->id }}" uk-icon="icon: close; ratio: 0.8"></a>
		</div>
		<div class="uk-card-secondary uk-card-header uk-padding-small tagColor">
			<h5 class="uk-margin-remove-bottom">
				<span class="uk-margin-right" uk-icon="icon: tag;"></span><span class="uk-text-bottom">{{ $tag->name }}</span>
			</h5>
		</div>
		<div class="uk-card-body uk-padding-remove">
			<div class="uk-overflow-auto">
	        	<ul uk-accordion>
				    <li>
				        <h4 class="uk-accordion-title uk-padding-small">{!! count($nestedTags) !!} tags</h4>
				        <div class="uk-accordion-content uk-margin-remove">
				        	<ul class="uk-list">
							    <li>
									<table class="uk-table uk-table-hover uk-table-middle">
								        <tbody>
								        	@include('includes/formNewTag')	
								        	@if(count($nestedTags) >= 1)
												@foreach ($nestedTags as $nestedTag)
										            <tr>
										                <td><span uk-icon="icon: label"></span></td>
										                <td>{!! $nestedTag->name !!}</td>
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