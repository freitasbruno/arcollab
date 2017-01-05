@extends('layouts.master')

@section('header')

	<!-- Jumbotron Header -->
    <header class="jumbotron hero-spacer">
        <h1>{!! $group->name !!}</h1>
        <p>{!! $group->description !!}</p>
        <p><a class="btn btn-primary btn-large">Call to action!</a></p>
    </header>
    
@stop

@section('content') 
	@if(!empty($items))
		@foreach($items as $item)
			<div class="col-lg-3 col-md-4 col-sm-6 col-centered">
				<div class="panel panel-default panel-profile">
					<div class="panel-heading"><h3>{{ $item->title }}</h3></div>
					<div class="panel-body text-center">
						<p>{{ $item->description }}</p>
						<a href="/item/{{ $item->id }}" class="btn btn-primary">OPEN</a>
		                <a href="/deleteItem/{{ $item->id }}" class="btn btn-default">Delete</a>
					</div>
				</div>
		    </div>
		@endforeach
	@endif
	
	<div class="row row-centered">
		<div class="col-lg-2 col-md-3 col-sm-6 col-centered">
	    	<h3>New Group</h3>
	    	{!! BootForm::open(array('url' => 'newGroup')) !!}
				{!! BootForm::hidden('group_id', $group->id) !!}
				{!! BootForm::text('name') !!}
				{!! Form::textarea('description', null, ['rows' => '5']) !!}
				{!! BootForm::submit('Create') !!}
			{!! BootForm::close() !!}
	    </div>
	    <div class="col-lg-2 col-md-3 col-sm-6 col-centered">
	    	<h3>New Issue</h3>
	    	{!! BootForm::open(array('url' => 'newItem')) !!}
				{!! BootForm::hidden('group_id', $group->id) !!}
				{!! BootForm::text('title') !!}
				{!! Form::textarea('description', null, ['rows' => '5']) !!}
				{!! BootForm::submit('Create') !!}
			{!! BootForm::close() !!}
	    </div>		
	</div>
	
@stop