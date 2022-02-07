@extends('layouts.admin')


@section('content')
    <h1 class="text-center">Edit User</h1>

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

            <div style="display:inline;">

                <div class="form-group" style="float: left; width: 220px">
                    <br>
                    {!! Form::submit('Update User', ['class'=>'btn btn-primary col-sm-12']) !!}
                </div>
                {!! Form::close() !!}

                <br>
                {!! Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\AdminUsersController@destroy', $user->id]]) !!}

                <div class="form-group">
                    {!! Form::submit('DELETE', ['class'=>'btn btn-danger float-end col-sm-3']) !!}
                </div>

            </div>

            {!! Form::close() !!}

        </div>

    </div>



    <div class="row">
        @include('includes.form_error')
    </div>


@endsection

