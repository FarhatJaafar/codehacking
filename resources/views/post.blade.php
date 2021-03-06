@extends('layouts.blog-post')

@section('content')

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->
    <p>{{$post->body}}</p>
    <hr>

    @if(Session::has('comment message'))
        {{session('comment message')}}
    @endif
    <!-- Blog Comments -->
    @if(Auth::check())
    <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>

            {!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\PostCommentsController@store']) !!}

                <input type="hidden" name="post_id" value="{{$post->id}}">

                <div class="form-group">
                    {!! Form::label('body', 'Body:') !!}
                    {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>3]) !!}
                </div>
                <div class="form-group">
                {!! Form::submit('Submit comment', ['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}

        </div>

        <hr>
    @endif

    <!-- Posted Comments -->

@if(count($comments) > 0)
    <!-- Comment -->
    @foreach($comments as $comment)
        <div class="media">
            <a class="pull-left" href="#">
                <img height="64px" width="64px" class="media-object" src="{{$comment->photo}}" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{$comment->author}}
                    <small>{{$comment->created_at->diffForHumans()}}</small>
                </h4>
                <p>{{$comment->body}}</p>

                @if(count($comment->replies) > 0)

                    @foreach($comment->replies as $reply)

                        @if($reply->is_active == 1)

                            <!-- Nested Comment -->
                            <div class="media" id="nested-comment">
                                <a class="pull-left" href="#">
                                    <img height="50px" width="50px" class="media-object" src="{{$reply->photo}}" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$reply->author}}
                                        <small>{{$reply->created_at->diffForHumans()}}</small>
                                    </h4>
                                    <p>{{$reply->body}}</p>
                                </div>

                            </div>
                            @endif

                    @endforeach

                @endif
{{--                <div class="comment-reply-container">--}}

{{--                    <button class="toggle-reply btn btn-primary pull-right">Reply</button>--}}



                        {!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\CommentRepliesController@createReply']) !!}
                            <div class="form-group">

                                <input type="hidden" name="comment_id" value="{{$comment->id}}">

                                {!! Form::label('body', 'Body:') !!}
                                {!! Form::textarea('body', null, ['class'=>'form-control', 'rows'=>1]) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
                            </div>
                        {!! Form::close() !!}
                        <!-- End Nested Comment -->



{{--                </div>--}}

            </div>
        </div>
    @endforeach
@endif

@endsection

