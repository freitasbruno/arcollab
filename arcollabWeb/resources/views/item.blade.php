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
	    <div class="uk-container uk-container-small">
			<div class="col-md-10 col-xs-12 col-centered">
				<div class="panel panel-default panel-profile">
					<div class="panel-heading"><h3>{{ $item->title }}</h3></div>
					<div class="panel-body">
						<p>{{ $item->description }}</p>
					</div>
				</div>
		    </div>
			@if(!empty($comments))
				@foreach($comments as $comment)
					<?php $user = User::find($comment->createdBy); ?>
					
					<div>
				        <div class="uk-card uk-card-default uk-card-hover  uk-margin-bottom">
				        	<div class="uk-card-header uk-padding-small uk-background-muted comment-header">
					        	@if(isset($user))
					            	<p class="uk-panel-title "><span class="uk-margin-right" uk-icon="icon: user"></span><b>{{ $user->name }}</b> - {{ $comment->created_at }}</p>
					            @endif
				            </div>
				            <div class="uk-card-body comment-body">
				            	<p>{{ $comment->description }}</p>
				            </div>
				        </div>
				    </div>
				@endforeach
				<div>
			        <div class="uk-card uk-card-default uk-card-hover  uk-margin-bottom">
			        	<div class="uk-card-header uk-padding-small uk-background-muted comment-header">
				            <p class="uk-panel-title "><span class="uk-margin-right" uk-icon="icon: user"></span><b>John Doe</b> - 2017-01-12 00:32:21</p>
			            </div>
			            <div class="uk-card-body comment-body">
			            	<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. </p>
			            	<ul uk-accordion>
							    <li>
							        <h3 class="uk-accordion-title">3 atachments</h3>
							        <div class="uk-accordion-content">
							        	<ul class="uk-list">
										    <li><span uk-icon="icon: download"></span>Drawing.dwg</li>
										    <li><span uk-icon="icon: download"></span>Image.jpg</li>
										    <li><span uk-icon="icon: download"></span>Document.pdf</li>
										</ul>
							        </div>
							    </li>
							</ul>
			            </div>
			        </div>
			    </div>
							
			@endif
			
			@include('includes/formNewComment')
	    </div>
    </div>
	
@stop