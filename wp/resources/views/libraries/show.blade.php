@extends('layouts.app')
@section('content')

@foreach($contents as $content)


<div align="center">
{!! Form::open(['url' => 'contents/' . $content->id]) !!}
    {!! Form::submit($content->title, array('class' => 'btn btn-primary')) !!}
{!! Form::close() !!}
</div>

@endforeach

@endsection