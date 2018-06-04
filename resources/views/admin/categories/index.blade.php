@extends('layouts.admin')







@section('content')


<h1>Category List</h1>
<div class="alert alert-danger text-center">

    {{Session::has('deleted_cat') ? session('deleted_cat') : Null}}
    {{Session::has('updated_cat') ? session('updated_cat') : Null}}
    {{Session::has('created_cat') ? session('created_cat') : Null}}

</div>
<table class="table">
    <thead>
      <tr>
        <th>Category Id</th>
        <th>Category Title</th>
        <th>Created</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>

    @foreach($category as $cat)
    <tbody>
      <tr>
        <td>{{$cat->id}}</td>
        <td>{{$cat->name}}</td>
        <td>{{$cat->created_at}}</td>
        <td><a href="{{route('categories.edit', $cat->id)}}" class="btn btn-primary btn-outline">Edit</a></td>
        <td>
         {!! Form::open(['method'=>'DElETE','action'=>['AdminCategoryController@destroy', $cat->id]]) !!}
         {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-outline']) !!}
         {!! Form::close() !!}
        </td>
      </tr>
    </tbody>
        @endforeach
  </table>


@stop
@section('footer')







@stop



