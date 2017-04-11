@extends('layouts.app')
@section('content')

<h1 align="center">{{ $user->username }}'s profile</h1>

@if($user->id == Auth::user()->id)

<hr style="border-bottom:1px solid;">

<div class="col-md-4 col-md-offset-4">
<h1 align="center">Add new art</h1>
<form method="POST" action="/contents/uploadart" enctype="multipart/form-data">
   {{ csrf_field() }}
  <div class="form-group row">
    <label for="example-text-input" class="col-1 col-form-label"></label>
    <label for="example-text-input" class="col-1 col-form-label">Title</label>
    <div class="col-5">
      <input name="title" class="form-control" type="text" placeholder="title of your work" >
    </div>
  </div>
  <div class="form-group row">
    <label for="example-text-input" class="col-1 col-form-label"></label>
    <label for="example-search-input" class="col-1 col-form-label">Summary</label>
    <div class="col-8">
      <textarea name="summary" placeholder="summarize your content here" class="form-control"></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="example-text-input" class="col-1 col-form-label"></label>
    <label for="example-search-input" class="col-1 col-form-label">Upload file</label>
    <div class="col-8">
      <input name="fileToUpload" type="file">
    </div>
  </div>
  <div class="form-group row">
    <label for="example-search-input" class="col-2 col-form-label"></label>
    <div class="col-10">
      <button type="submit" name="submit" class="btn btn-primary">Upload Art</button>
    </div>
  </div>

</form>
</div>


@endif

<div class="col-md-12">
<hr style="border-bottom:1px solid;">
<h1 align="center">Your Art</h1>

@foreach ($contents as $content)
  <div class="row">
    <div class="col-md-8">
      <h3 align="center"> {{ $content->title }}  </h3>
    </div>
    <div class="col-md-2">
    @if($user->id == Auth::user()->id)
      {!! Form::open(['url' => '/delete']) !!}
      {!! Form::hidden('content_id', $content->id) !!}
      {!! Form::hidden('name', $content->filename) !!}
          {!! Form::submit('delete', array('class' => 'btn btn-danger')) !!}
      {!! Form::close() !!}
      @endif
      {!! Form::open(['url' => 'contents/' . $content->id]) !!}
          {!! Form::submit('Full View', array('class' => 'btn btn-primary')) !!}
      {!! Form::close() !!}
    </div>
  </div>
<hr>
@endforeach
</div>
@endsection
