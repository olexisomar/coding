@extends('layouts.admin')







@section('content')


    <h1>Create Users</h1>



{!! Form::open(['method'=>'POST','action'=>'AdminUsersController@store', 'files'=> true]) !!}

         {!! Form::label('Username') !!}
         {!! Form::text('name',null, ['class'=>'form-control']) !!}<br>
         {!! Form::label('email address') !!}
         {!! Form::email('email',null, ['class'=>'form-control']) !!}<br>
         {!! Form::label('is_active') !!}
         {!! Form::select('is_active',[''=>'Choose Options', 1 =>'Active', 0 =>'Inactive' ],'', ['class'=>'form-control']) !!}<br>
         {!! Form::label('Role') !!}
         {!! Form::select('role_id', [''=>'Choose Options'] + $roles, '',['class'=>'form-control']) !!}<br>
         {!! Form::file('photo_id',null, ['class'=>'form-control']) !!}<br>
         {!! Form::label('password','Password') !!}<br>
         {!! Form::password('password', ['class'=>'form-control']) !!}<br>
         {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}

{!! Form::close() !!}


    @include('includes.form_errors')







@stop
@section('footer')







@stop



