@extends('layouts.admin')


@section('content')
    <h1>Edit User</h1>

    <div class="row">
        <div class="col-sm-2">
            <img height="150px" width="150px" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt="" class="img-responsive img-rounded">
        </div>

        <div class="col-sm-10">

            {!! Form::model($user, ['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminUsersController@update', $user->id], 'files'=>true]) !!}
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
                {!! Form::select('is_active', array(1 => 'Active', 0 => 'Not Active'), null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role:') !!}
                {!! Form::select('role_id', $roles, null , ['class' => 'form-control']) !!}
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
                {!! Form::submit('Edit User', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>
    <div class="row">
        @include('includes.form_error')
    </div>


@endsection

