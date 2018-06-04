@extends('layouts.admin')






@section('content')

{{--@if(Session::has('deleted_user'))--}}

    {{--<p class="alert-danger" align="center">{{session('deleted_user')}}</p>--}}

{{--@endif--}}

<p class="alert-danger" align="center">{{Session::has('deleted_user') ? session('deleted_user') : false}}</p>

{{--@if(Session::has('created_user'))--}}

    {{--<p class="alert-danger" align="center">{{session('created_user')}}</p>--}}

{{--@endif--}}
<p class="alert-danger" align="center">{{Session::has('created_user') ? session('created_user') : false}}</p>
{{--@if(Session::has('updated_user'))--}}

    {{--<p class="alert-danger" align="center">{{session('updated_user')}}</p>--}}

{{--@endif--}}
<p class="alert-danger" align="center">{{Session::has('updated_user') ?  session('updated_user')  : false }}</p>

<h1>Users</h1>

<table class="table">
<thead>
  <tr>
    <th>Id</th>
    <th>Photo</th>
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
    @if($user->photo)
      <td><a href="{{route('users.edit',$user->id)}}"><img src="{{$user->photo->path}}" height="100px" width="100" alt="" class="img-circle"></a></td>
     @else
      <td><img src="http://via.placeholder.com/100x100" alt=""></td>
    @endif
    <td><strong>{{$user->name}}</strong></td>
    <td>{{$user->email}}</td>
    @if($user->role)
    <td>{{$user->role->name}}</td>
    @else
      <td>{{'Admin'}}</td>
    @endif
      @if($user->is_active == 1)
    <td>{{'Active'}}</td>
      @else
    <td>{{'Not Active'}}</td>
      @endif
    <td>{{$user->created_at->diffForHumans()}}</td>
    <td>{{$user->updated_at->diffForHumans()}}</td>
    <td><a class="btn btn-info btn-outline res" href="{{route('users.edit',$user->id)}}">{{'edit'}}</a></td>
    <td> {!! Form::close() !!}
      {!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy', $user->id]]) !!}
      {!! Form::submit('Delete User', ['class'=>'btn btn-danger btn-outline']) !!}
      {!! Form::close() !!}
    </td>
  </tr>

@endforeach
@endif
</tbody>
</table>



@stop






@section('footer')



@stop