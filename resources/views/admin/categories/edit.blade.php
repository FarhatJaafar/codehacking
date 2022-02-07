@extends('layouts.admin')


@section('content')
    <h1 class="text-center">Categories</h1>

    <div class="row">

        <div class="col-sm-6">

            {!! Form::model($category,['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminCategoriesController@update', $category->id]]) !!}
            <div class="form-group">
                {!! Form::label('name', 'Category:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="row" style="display:inline;">

                <div class="form-group" style="float: left; width: 460px;"><br>
                    {!! Form::submit('Update Category', ['class'=>'btn btn-primary col-sm-4']) !!}
                </div>
                {!! Form::close() !!}

                {!! Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\AdminCategoriesController@destroy', $category->id]]) !!}

                <div class="form-group">
                    {!! Form::submit('Delete Category', ['class'=>'btn btn-danger']) !!}
                </div>

                {!! Form::close() !!}

            </div>
        </div>

    </div>

@endsection
