@extends('layouts.master')

@section('header')

	<!-- Jumbotron Header -->
    <header class="jumbotron hero-spacer">
        <h1>{!! $item->title !!}</h1>
        <p>{!! $item->description !!}</p>
    </header>
    
@stop

@section('content') 
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
	
@stop