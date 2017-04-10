@extends('layouts.app')
@section('content')

<div align="left">
<div class="col-md-2">

<div class="row" align="right">
	{!! Form::open(['url' => '/downvote']) !!}
	{!! Form::hidden('content_id', $content->id) !!}
	{!! Form::hidden('rank', $content->rank) !!}
	    {!! Form::submit('v', array('class' => 'btn btn-primary')) !!}
	{!! Form::close() !!}
	</div>

</div>

<div class="col-md-7">

<div align="center">

	<h1>{{ $content->title }} </h1>

	<h2>written by {{ $content->user->username }}</h2>

	<h3>Rank: {{ $content->rank }}</h3>

	<h3>Summary</h3>

	<h4>{{ $content->summary }} </h4>

	{!! Form::open(['url' => '/openpdf']) !!}
	{!! Form::hidden('filename', $content->filename) !!}
	    {!! Form::submit('read', array('class' => 'btn btn-primary')) !!}
	{!! Form::close() !!}
</div>

</div>

<div class="col-md-2">
	<div class="row">
	{!! Form::open(['url' => '/upvote']) !!}
	{!! Form::hidden('content_id', $content->id) !!}
	{!! Form::hidden('rank', $content->rank) !!}
	    {!! Form::submit('^', array('class' => 'btn btn-primary')) !!}
	{!! Form::close() !!}

	</div>
</div>

@endsection
