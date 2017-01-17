<?php
$comments = $item->comments;
?>

<div>
	<div class="uk-card uk-card-default uk-card-hover">
	    <a href="/item/{{ $item->id }}">
			<div class="uk-card-secondary uk-card-header uk-text-center">
				<h4><span class="uk-margin-right" uk-icon="icon: warning; ratio: 1.3"></span>{{ $item->title }}</h4>
				<p>{{ $item->description }}</p>
			</div>
		</a>
		<div class="uk-card-body uk-padding-remove">
			
			@if(count($comments) >= 1)
			<div class="uk-overflow-auto">
			    <table class="uk-table uk-table-hover uk-table-middle">
			        <tbody>
						@foreach ($comments as $comment)
				            <tr>
				                <td><span uk-icon="icon: comment"></span></td>
				                <td>{!! $comment->description !!}</td>
				            </tr>
						@endforeach	            
			        </tbody>
			    </table>
			</div>
			@endif
			@include('includes/formNewComment')
		</div>
	</div>
</div>