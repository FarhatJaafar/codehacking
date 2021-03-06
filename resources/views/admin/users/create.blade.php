@extends('layouts.admin')


@section('content')
    <h1 class="text-center">Create User</h1>
    {!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminUsersController@store', 'files'=>true]) !!}
    {{csrf_field()}}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'email:') !!}
            {!! Form::email('email', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('is_active', 'Status:') !!}
            {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), 0, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('role_id', 'Role:') !!}
            {!! Form::select('role_id', [''=>'Choose Option'] + $roles->pluck('name', 'id')->toArray(), null , ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo_id', 'Photo:') !!}<br>
            {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password:') !!}
            {!! Form::password('password', ["class" => "form-control"]) !!}
        </div>

        <div class="form-group">
            <br>
        {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}

    @include('includes.form_error')

@endsection
