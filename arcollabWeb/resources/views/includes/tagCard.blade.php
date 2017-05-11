<?php
$tags = $tagCategory->tags;
?>

<div>
	<div class="uk-card uk-card-default uk-card-hover">
		<div class="uk-position-small uk-position-right uk-light">
			<a href="/deleteTag/{{ $tagCategory->id }}" uk-icon="icon: close; ratio: 0.8"></a>
		</div>
		<div class="uk-card-secondary uk-card-header uk-padding-small tagColor">
			<h5 class="uk-margin-remove-bottom">
				<span class="uk-margin-right" uk-icon="icon: tag;"></span><span class="uk-text-bottom">{{ $tagCategory->name }}</span>
			</h5>
		</div>
		<div class="uk-card-body uk-padding-remove">
			<div class="uk-overflow-auto">
	        	<ul uk-accordion>
				    <li>
				        <h4 class="uk-accordion-title uk-padding-small">{!! count($tags) !!} tags</h4>
				        <div class="uk-accordion-content uk-margin-remove">
				        	<ul class="uk-list">
							    <li>
									<table class="uk-table uk-table-hover uk-table-middle">
								        <tbody>
								        	@include('forms/formNewTag')	
								        	@if(count($tags) >= 1)
												@foreach ($tags as $tag)
										            <tr>
										                <td><span uk-icon="icon: label"></span></td>
										                <td>{!! $tag->name !!}</td>
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
