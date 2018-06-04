@extends('layouts.admin')







@section('content')

    <h1>Edit User {{$user->name}}</h1>
    <div class="row">
    
    <div class="col-sm-3">
        <img src="{{$user->photo ? $user->photo->path : 'http://via.placeholder.com/200x200'}}" alt="" class="img-responsive img-circle">
        
    </div>
<div class="col-sm-9">
    {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update', $user->id], 'files'=> true]) !!}

    {!! Form::label('Username') !!}
    {!! Form::text('name',null, ['class'=>'form-control']) !!}<br>
    {!! Form::label('email address') !!}
    {!! Form::email('email',null, ['class'=>'form-control']) !!}<br>
    {!! Form::label('is_active') !!}
    {!! Form::select('is_active',[''=>'Choose Options', 1 =>'Active', 0 =>'Inactive' ],null, ['class'=>'form-control']) !!}<br>
    {!! Form::label('Role') !!}
    {!! Form::select('role_id', [''=>'Choose Options'] + $roles, null,['class'=>'form-control']) !!}<br>
    {!! Form::file('photo_id',null, ['class'=>'form-control']) !!}<br>
    {!! Form::label('password','Password') !!}<br>
    {!! Form::password('password', ['class'=>'form-control']) !!}<br>
    {!! Form::submit('Update User', ['class'=>'btn btn-primary col-sm-6']) !!}

    {!! Form::close() !!}
    {!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy', $user->id]]) !!}
    {!! Form::submit('Delete User', ['class'=>'btn btn-danger col-sm-6']) !!}
    {!! Form::close() !!}
</div>



    </div>
    <br>
<div class="row">
    @include('includes/form_errors')
</div>


@stop
@section('footer')







@stop



