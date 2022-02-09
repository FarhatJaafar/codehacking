@extends('layouts.admin')


@section('content')



    @if(count($replies) > 0)
        <h1 class="text-center">replies</h1>


        <table class="table table-striped">
            <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Active</th>
                <th scope="col">author</th>
                <th scope="col">email</th>
                <th scope="col">body</th>
                <th scope="col">photo</th>
                <th scope="col">created_at</th>
                <th scope="col">updated_at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($replies as $reply)
                <tr>
                    <th scope="row">{{$reply->id}}</th>
                    <td>{{$reply->is_active}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{str_limit($reply->body,7)}}</td>
                    <td><img height="50px" src="{{$reply->comment->post->photo->file}}" alt=""></td>
                    <td>{{$reply->created_at->diffForHumans()}}</td>
                    <td>{{$reply->updated_at->diffForHumans()}}</td>
{{--                    <td><img height="50px" src="{{$reply->comment->post->photo->file}}" alt=""></td>--}}

                    <td>

                        @if($reply->is_active == 1)

                            {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\CommentRepliesController@update', $reply->id]]) !!}

                            <input type="hidden" name="is_active" value="0">

                            <div class="form-group">
                                {!! Form::submit('Un-approve', ['class'=>'btn btn-success']) !!}
                            </div>
                            {!! Form::close() !!}

                        @else
                            {!! Form::open(['method'=>'PATCH', 'action'=>['App\Http\Controllers\CommentRepliesController@update', $reply->id]]) !!}

                            <input type="hidden" name="is_active" value="1">

                            <div class="form-group">
                                {!! Form::submit('Approve', ['class'=>'btn btn-info']) !!}
                            </div>
                            {!! Form::close() !!}



                        @endif

                    </td>

                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\CommentRepliesController@destroy', $reply->id]]) !!}

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
        <h1 class="text-center">No replies</h1>

    @endif





@endsection
