@extends('layouts.master')

@section('header')
	@include('includes/projectHeader')
@stop

@section('content') 
	<div class="uk-section uk-padding-remove-top">
	    <div class="uk-container uk-container-medium">
	    	<article class="uk-comment">
			    <header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
			        <div class="uk-width-auto">
			            <span uk-icon="icon: warning; ratio: 2"></span>
			        </div>
			        <div class="uk-width-expand">
			            <h4 class="uk-comment-title uk-margin-remove"><a class="uk-link-reset" href="#">{!! $item->title !!}</a></h4>
			            <ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
			                <li><a href="#">12 days ago</a></li>
			                <li><a href="#">Reply</a></li>
			            </ul>
			        </div>
			    </header>
			    <div class="uk-comment-body">
			        <h4>{!! $item->description !!}</h4>
			    </div>
			</article>
			<hr>
	    	@include('includes/formNewComment')
			@each('includes/commentCard', $comments, 'comment')
	    </div>
    </div>
@stop