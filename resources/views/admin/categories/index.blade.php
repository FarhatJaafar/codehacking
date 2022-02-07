@extends('layouts.admin')


@section('content')
    <h1 class="text-center">Categories</h1>

    <div class="row">

        <div class="col-sm-6">

            {!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminCategoriesController@store']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Category:') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group"><br>
                {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}

        </div>

        <div class="col-sm-6">

            <table class="table table-striped">
                <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Created</th>
                    <th scope="col">Updated</th>
                </tr>
                </thead>
                <tbody>
                @if($categories)
                    @foreach($categories as $category)
                        <tr>
                            <td scope="row">{{$category->id}}</td>
                            <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
                            <td>{{$category->created_at->diffForHumans()}}</td>
                            <td>{{$category->updated_at->diffForHumans()}}</td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>

        </div>
    </div>


@endsection
