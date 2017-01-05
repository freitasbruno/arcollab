@extends('layouts.master')

@section('header')

	<!-- Jumbotron Header -->
    <header class="jumbotron hero-spacer">
        <h1>{!! $item->title !!}</h1>
        <p>{!! $item->description !!}</p>
    </header>
    
@stop

@section('content') 
	@if(!empty($comments))
		@foreach($comments as $comment)
			<div class="col-lg-3 col-md-4 col-sm-6 col-centered">
				<div class="panel panel-default panel-profile">
					<div class="panel-body text-center">
						<p>{{ $comment->description }}</p>
					</div>
				</div>
		    </div>
		@endforeach
	@endif
@stop