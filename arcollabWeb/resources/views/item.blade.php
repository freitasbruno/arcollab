@extends('layouts.master')

@section('header')
	@include('includes/projectHeader')
@stop

@section('content') 
	<div class="uk-section uk-padding-remove-top">
	    <div class="uk-container uk-container-medium">
			@each('includes/commentCard', $comments, 'comment')
			@include('includes/formNewComment')
	    </div>
    </div>
@stop