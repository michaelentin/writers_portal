@extends('layouts.app')
@section('content')

<h1>{{ $user->username }}'s info will display here</h1>

<hr>

<form method="POST" action="users/{{ $user->id }}/content">

    {{-- if we need to do something other than post in laravel, use

    {{ method_field('DELETE') }} to delete or {{ method_field('PATCH') }} for patching --}}

    {{ csrf_field() }}

    <textarea name="title" placeholder="Name your art here" class="form-control"></textarea>

    {{-- TODO add files once we get there --}}

    <button type="submit" class="btn btn-primary">Upload Art</button>

</form>

@endsection