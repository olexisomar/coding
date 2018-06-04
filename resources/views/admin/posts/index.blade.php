@extends('layouts.admin')







@section('content')


    <h1>Posts</h1>
    <p class="alert-danger" align="center">{{Session::has('deleted_post') ? session('deleted_post') : false}}</p>
    <p class="alert-danger" align="center">{{Session::has('created_post') ? session('created_post') : false}}</p>
    <p class="alert-danger" align="center">{{Session::has('updated_post') ? session('updated_post') : false}}</p>
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
            <td>{{$post->category ? $post->category->name : null}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->created_at->diffForhumans()}}</td>
            <td>{{$post->updated_at->diffForhumans()}}</td>
            <td><a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary btn-outline">Edit</a></td>
            <td>{!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy', $post->id]]) !!}
                  {!! Form::submit('Delete Post', ['class'=>'btn btn-danger btn-outline']) !!}
                  {!! Form::close() !!}</td>
          </tr>
        @endforeach
    @endif

      </table>




@stop
@section('footer')







@stop



