@extends('layouts.app')

@section('navbar_left')
<li>
  {!! Form::open(['url' => '/sort']) !!}
    {!! Form::hidden('sort_id', '0') !!}
    {!! Form::submit('Most Popular', array('class' => 'btn btn-primary')) !!}
  {!! Form::close() !!}
</li>
<li>
  {!! Form::open(['url' => '/sort']) !!}
    {!! Form::hidden('sort_id', '1') !!}
    {!! Form::submit('Least Popular', array('class' => 'btn btn-primary')) !!}
  {!! Form::close() !!}
</li>
<li>
<form action="/home">
    <input type="submit" class="btn btn-primary" value="Most Recent" />
</form>
</li>
<li>
  {!! Form::open(['url' => '/sort']) !!}
    {!! Form::hidden('sort_id', '2') !!}
    {!! Form::submit('Least Recent', array('class' => 'btn btn-primary')) !!}
  {!! Form::close() !!}
</li>

@endsection

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-8">
            <div class="panel-body">

                @foreach ($contents as $content)
                <div class="row">
                    <div class="col-md-2">
                      <div class="row">
                        {!! Form::open(['url' => '/upvote']) !!}
                        {!! Form::hidden('content_id', $content->id) !!}
                        {!! Form::hidden('rank', $content->rank) !!}
                            {!! Form::submit('^', array('class' => 'btn btn-primary')) !!}
                        {!! Form::close() !!}

                      </div>
                      <div class="row">
                        <h4> {{ $content->rank }}</h4>
                      </div>
                      <div class="row">
                        {!! Form::open(['url' => '/downvote']) !!}
                        {!! Form::hidden('content_id', $content->id) !!}
                        {!! Form::hidden('rank', $content->rank) !!}
                            {!! Form::submit('v', array('class' => 'btn btn-primary')) !!}
                        {!! Form::close() !!}
                      </div>
                    </div>
                    <div class="col-md-10">
                      <div class="content">

                      <h1> {{ $content->title }}  </h1>


                      <h3> Uploaded by 
                        <a href="/user/{{ $content->user->id }}">
                        {{ $content->user->username }}
                        </a> 
                        on {{ $content->created_at->toFormattedDateString() }}
                      </h3>

                      This is where content links will be placed

                          {!! Form::open(['url' => 'library/addContent']) !!}
                              {!! Form::hidden('content_id', $content->id) !!}
                              {!! Form::submit('Add Art To Library', array('class' => 'btn btn-primary')) !!}
                          {!! Form::close() !!}

                          {!! Form::open(['url' => 'contents/' . $content->id]) !!}
                              {!! Form::submit('Full View', array('class' => 'btn btn-primary')) !!}
                          {!! Form::close() !!}

                      <hr>

                          <div class="comments">

                              <ul class="list-group">

                                @foreach ($content->comments as $comment)

                                  @if( $loop->iteration  < 6)

                                    <li class="list-group-item">

                                    <strong> {{ $comment->created_at->diffForHumans() }} from
                                        <a href="/user/{{ $comment->user->id }}">
                                            {{ $comment->user->username }}:
                                        </a>
                                    </strong>

                                    <br>

                                    {{ $comment->body }}

                                    @if($comment->user->id == Auth::user()->id)
                                    {!! Form::open(['url' => '/comments/delete']) !!}
                                        {!! Form::hidden('comment_id', $comment->id) !!}
                                        {!! Form::submit('delete', array('class' => 'btn btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endif

                                    </li>
                                  @else
                                    @break;
                                  @endif

                                @endforeach


                              <form method="POST" action="contents/{{ $content->id }}/comments">

                                  {{-- if we need to do something other than post in laravel, use

                                  {{ method_field('DELETE') }} to delete or {{ method_field('PATCH') }} for patching --}}

                                  {{ csrf_field() }}

                                  <textarea name="body" placeholder="Comment here" class="form-control"></textarea>

                                  <button type="submit" class="btn btn-primary">Add Comment</button>

                              </form>

                              <hr>

                              </ul>

                          </div>

                      </div>
                    </div>
                </div>


                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
