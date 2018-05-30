@extends('layouts.admin')






@section('content')

<h1>Users</h1>

<table class="table">
<thead>
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Role</th>
    <th>Status</th>
    <th>Date created</th>
    <th>Updated</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
</thead>
<tbody>
@if($users)
@foreach($users as $user)

  <tr>
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->role->name}}</td>
      @if($user->is_active == 1)
    <td>{{'Yes'}}</td>
      @else
    <td>{{'No'}}</td>
      @endif
    <td>{{$user->created_at->diffForHumans()}}</td>
    <td>{{$user->updated_at->diffForHumans()}}</td>
    <td><a class="btn btn-info btn-outline" href="#">{{'edit'}}</a></td>
    <td><a class="btn btn-outline btn-danger" href="#">{{'delete'}}</a></td>
  </tr>

@endforeach
@endif
</tbody>
</table>



@stop






@section('footer')



@stop