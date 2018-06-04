@extends('layouts.admin')







@section('content')


    <h1>Posts</h1>

    <table class="table">
        <thead>
          <tr>
            <th>Post</th>
            <th>Photo</th>
            <th>Author</th>
            <th>Category</th>
            <th>Title</th>
            <th>Content</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Edit</th>
            <th>Delete</th>
          </tr>
        </thead>

    @if($posts)
        @foreach($posts as $post)
           
        <tbody>
          <tr>
            <td>{{$post->id}}</td>
              @if($post->photo)
                  <td><img src="{{$post->photo->path}}" alt="" height="100"></td>
              @else
                  <td><img src="http://placehold.it/100x100" alt=""></td>
              @endif
            <td>{{$post->user->name}}</td>
            <td>{{$post->category_id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->created_at->diffForhumans()}}</td>
            <td>{{$post->updated_at->diffForhumans()}}</td>
            <td><a href="#" class="btn btn-primary btn-outline">Edit</a></td>
            <td><a href="#" class="btn btn-danger btn-outline">Delete</a></td>
          </tr>
        @endforeach
    @endif

      </table>




@stop
@section('footer')







@stop



