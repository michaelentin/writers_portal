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
          {!! Form::submit('delete', array('class' => 'btn btn-danger')) !!}
      {!! Form::close() !!}
    </div>
  </div>

@endforeach

<hr style="border-bottom:1px solid;">

<h1>Add new art</h1>

<form method="POST" action="/contents/uploadart">

    {{-- if we need to do something other than post in laravel, use

    {{ method_field('DELETE') }} to delete or {{ method_field('PATCH') }} for patching --}}

    {{ csrf_field() }}

    <textarea name="title" placeholder="Name your art here" class="form-control"></textarea>

    {{-- TODO add files once we get there --}}

    <div class="dropdown">
      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Select tag(s)
      <span class="caret"></span></button>
      <ul class="dropdown-menu">
        <li><a href="#">Drama</a></li>
        <li><a href="#">Horror</a></li>
        <li><a href="#">Sci-Fi</a></li>
      </ul>
    </div>

    <button type="submit" class="btn btn-primary">Upload Art</button>

</form>



@endsection
