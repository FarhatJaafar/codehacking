@extends('layouts.admin')


@section('content')



    @if(count($comments) > 0)
        <h1 class="text-center">Comments</h1>


        <table class="table table-striped">
            <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Post</th>
                <th scope="col">Active</th>
                <th scope="col">author</th>
                <th scope="col">email</th>
                <th scope="col">body</th>
                <th scope="col">photo</th>
                <th scope="col">View Reply</th>
                <th scope="col">created_at</th>
                <th scope="col">updated_at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <th scope="row">{{$comment->id}}</th>
                    <td><a href="{{route('post', $comment->post->id)}}">{{$comment->post->title}}</a></td>
                    <td>{{$comment->is_active}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{str_limit($comment->body,7)}}</td>
                    <td>{{str_limit($comment->photo, 7)}}</td>
                    <td><a href="{{route('replies.show', $comment->id)}}">View Replies</a></td>
                    <td>{{$comment->created_at->diffForHumans()}}</td>
                    <td>{{$comment->updated_at->diffForHumans()}}</td>
                    <td><img height="50px" src="{{$comment->post->photo->file}}" alt=""></td>

                    <td>

                        @if($comment->is_active == 1)

                            {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\PostCommentsController@update', $comment->id]]) !!}

                            <input type="hidden" name="is_active" value="0">

                            <div class="form-group">
                                {!! Form::submit('Un-approve', ['class'=>'btn btn-success']) !!}
                            </div>
                            {!! Form::close() !!}

                        @else
                            {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\PostCommentsController@update', $comment->id]]) !!}

                            <input type="hidden" name="is_active" value="1">

                            <div class="form-group">
                                {!! Form::submit('Approve', ['class'=>'btn btn-info']) !!}
                            </div>
                            {!! Form::close() !!}

                        @endif

                    </td>

                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\PostCommentsController@destroy', $comment->id]]) !!}

                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}

                    </td>

                </tr>
            @endforeach

            </tbody>
        </table>

    @else
        <h1 class="text-center">No Comments</h1>

    @endif





@endsection
