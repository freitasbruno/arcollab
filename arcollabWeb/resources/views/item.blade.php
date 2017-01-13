@extends('layouts.master')

@section('header')

	<div class="uk-section uk-section-small uk-section-muted">
    	<div class="uk-container uk-container-expand uk-text-center">
    		<div>
	    		<h1>{!! $item->title !!}</h1>
		        <h3>{!! $item->description !!}</h3>
    		</div>
	        
    	</div>
    </div>
    
@stop

@section('content') 

	<div class="uk-section">
	    <div class="uk-container uk-container-large">
			<div class="col-md-10 col-xs-12 col-centered">
				<div class="panel panel-default panel-profile">
					<div class="panel-heading"><h3>{{ $item->title }}</h3></div>
					<div class="panel-body">
						<p>{{ $item->description }}</p>
					</div>
				</div>
		    </div>
			@if(!empty($comments))
				<div class="col-md-10 col-xs-12 col-centered">
					<div class="panel panel-default">
					@foreach($comments as $comment)
								<div class="panel-body" style="border-bottom:1px dotted #CCC">
									<p>{{ $comment->description }}</p>
								</div>
					@endforeach
					</div>
				</div>
			@endif
			<div class="col-md-10 col-xs-12 col-centered">
		    	{!! BootForm::open(array('url' => 'newComment')) !!}
					{!! BootForm::hidden('item_id', $item->id) !!}
					{!! BootForm::text('comment', false) !!}
					{!! BootForm::submit('Comment') !!}
				{!! BootForm::close() !!}
		    </div>
		    
		    <article class="uk-comment">
			    <header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
			        <div class="uk-width-auto">
			            <img class="uk-comment-avatar" src="../docs/images/avatar.jpg" width="80" height="80" alt="">
			        </div>
			        <div class="uk-width-expand">
			            <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#">Author</a></h4>
			            <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
			                <li><a href="#">12 days ago</a></li>
			                <li><a href="#">Reply</a></li>
			            </ul>
			        </div>
			    </header>
			    <div class="uk-comment-body">
			        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
			    </div>
			</article>
	    </div>
    </div>
	
@stop