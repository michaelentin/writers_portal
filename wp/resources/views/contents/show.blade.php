@extends('layouts.app')
@section('content')

<h1 align="center">{{ $content->title }} </h1>

<h2 align="center">written by {{ $content->user->username }}</h2>

<h3 align="center"> Summary </h3>

<h5 align="center">{{ $content->summary }} </h5>

<h6 align="center"> This is where users will be able to read content</h6>

@endsection