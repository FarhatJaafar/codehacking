@extends('layouts.admin')


@section('content')

    <h1 class="text-center">Posts</h1>

    <table class="table table-striped">
            <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Photo</th>
                <th scope="col">Owner</th>
                <th scope="col">Category</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
                <th scope="col">Created</th>
                <th scope="col">Updated</th>
            </tr>
            </thead>
            <tbody>

            @if($posts)
                @foreach($posts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td><img height="50px" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400' }}" alt=""></td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->category ? $post->category->name : 'not categorised' }}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>
                <td>{{$post->created_at->diffForhumans()}}</td>
                <td>{{$post->updated_at->diffForhumans()}}</td>
            </tr>
                @endforeach
            @endif
            </tbody>
        </table>

@endsection
