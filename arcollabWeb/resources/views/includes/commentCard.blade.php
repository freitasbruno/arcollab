<?php 
	$user = User::find($comment->createdBy);
	$files = $comment->attachements;
?>
					
<div>
    <div class="uk-card uk-card-default uk-card-hover  uk-margin-bottom">
    	<div class="uk-card-header uk-padding-small uk-background-muted comment-header">
        	@if(isset($user))
            	<p class="uk-panel-title "><span class="uk-margin-right" uk-icon="icon: user"></span><b>{{ $user->name }}</b> - {{ $comment->created_at }}</p>
            @endif
        </div>
        <div class="uk-card-body comment-body">
        	<p>{{ $comment->description }}</p>
        	<ul class="uk-list">
        	@foreach ($files as $file)
        		<li><a class="uk-link-muted" href="/uploads/{!! $file->filename !!}" target="_blank"><span uk-icon="icon: download"></span></a>{!! $file->originalName !!}</li>
        	@endforeach	
        	</ul>
        	
        </div>
    </div>
</div>