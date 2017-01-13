<?php
$comments = $item->comments;
?>

<div>
	<div class="uk-card uk-card-default uk-card-hover">
	    <a href="/item/{{ $item->id }}">
			<div class="uk-card-secondary uk-card-header uk-text-center">
				<h3><span class="uk-margin-right" uk-icon="icon: folder; ratio: 1.5"></span>{{ $item->title }}</h3>
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
				                <td><span uk-icon="icon: warning"></span></td>
				                <td>{!! $comment->description !!}</td>
				            </tr>
						@endforeach	            
			        </tbody>
			    </table>
			</div>
			@endif
			@include('includes/formNewComment')
			
	        <a href="/item/{{ $item->id }}" uk-icon="icon: pencil"></a>
	        <a href="/deleteItem/{{ $item->id }}" uk-icon="icon: trash"></a>
		</div>
	</div>
</div>