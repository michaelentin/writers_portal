@extends('layouts.app')
@section('content')

@foreach($contents as $content)

<h1> {{ $content->title }}  // show file link here to read novel</h1>

@endforeach

@endsection