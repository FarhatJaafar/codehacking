@extends('layouts.admin')


@section('content')

    <h1 class="text-center">Media</h1>

    @if($photos)

        <table class="table table-striped">
            <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
            </tr>
            </thead>
            <tbody>

            @foreach($photos as $photo)
                <tr>
                    <th scope="row">{{$photo->id}}</th>
                    <td><img height="100px" src="{{$photo->file ? $photo->file : 'no photo'}}" alt=""></td>
                    <td>{{$photo->created_at}}</td>
                    <td>{{$photo->updated_at}}</td>
                    <td>
                    {!! Form::open([$photo, 'method'=>'DELETE', 'action'=>['App\Http\Controllers\AdminMediasController@destroy', $photo->id]]) !!}

                        <div class="form-group">
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>

                    {!! Form::close() !!}

                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

    @endif
@endsection
