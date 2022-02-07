@extends('layouts.admin')


@section('content')
    <h1 class="text-center">Categories</h1>

    <div class="row">

        <div class="col-sm-6">

            {!! Form::model($category,['method'=>'POST', 'action'=>['App\Http\Controllers\AdminCategoriesController@update', $category->id]]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Category:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group"><br>
                {!! Form::submit('Update Category', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}

        </div>

        <div class="col-sm-6">

            {!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\PostsController@store']) !!}
                <div class="form-group">
                    {!! Form::label('title', 'Title:') !!}
                    {!! Form::text('title', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}

        </div>

    </div>


@endsection
