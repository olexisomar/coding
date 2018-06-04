@extends('layouts.admin')







@section('content')


<h1>Create Category</h1>
    {!! Form::open(['method'=>'POST','action'=>['AdminCategoryController@store']]) !!}

             {!! Form::label('Category Title') !!}
             {!! Form::text('name',null, ['class'=>'form-control']) !!}
             {!! Form::hidden('_method','POST') !!}
             {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}

      {!! Form::close() !!}

    @include('includes.form_errors')




@stop
@section('footer')







@stop



