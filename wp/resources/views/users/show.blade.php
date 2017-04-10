<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
@extends('layouts.app')
@section('content')

<h1>{{ $user->username }}'s profile</h1>
<hr style="border-bottom:1px solid;">

@foreach ($contents as $content)
  <div class="row">
    <div class="col-md-10">
      <h1> {{ $content->title }}  </h1>
    </div>
    <div class="col-md-2">
      {!! Form::open(['url' => '/delete']) !!}
      {!! Form::hidden('content_id', $content->id) !!}
      {!! Form::hidden('name', $content->filename) !!}
          {!! Form::submit('delete', array('class' => 'btn btn-danger')) !!}
      {!! Form::close() !!}
    </div>
  </div>

@endforeach

<hr style="border-bottom:1px solid;">

<h1>Add new art</h1>

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
      <input name="summary" class="form-control" type="search" placeholder="add a summary about your work">
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
@endsection
