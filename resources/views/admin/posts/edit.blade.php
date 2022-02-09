@extends('layouts.admin')


@section('content')

    <h1 class="text-center">Edit Post</h1>

    <div class="row">

        <div class="col-sm-3">
            <img src="{{$post->photo ? $post->photo->file : 'No Photo'}}" alt="" class="img-responsive">
        </div>

        <div class="col-sm-9">

        {!! Form::model($post, ['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminPostsController@update', $post->id], 'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category_id', 'Category:') !!}
            {!! Form::select('category_id', $categories->pluck('name','id')->toArray(), null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('photo_id', 'Photo:') !!}<br>
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('body', 'Description:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
        </div>

        <div class="row" style="display:inline;">

            <div class="form-group" style="float: left; width: 420px"><br>
                {!! Form::submit('Update Post', ['class'=>'btn btn-primary col-sm-12']) !!}
            </div>
            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\AdminPostsController@destroy', $post->id]]) !!}

            <div class="form-group">
                {!! Form::submit('DELETE', ['class'=>'btn btn-danger float-end col-sm-5']) !!}
            </div>

        </div>

        {!! Form::close() !!}

        </div>

    </div>


    <div class="row">
        @include('includes.form_error')
    </div>


@endsection
