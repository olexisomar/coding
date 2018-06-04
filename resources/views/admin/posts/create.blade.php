@extends('layouts.admin')







@section('content')


    <h1>Create Post</h1>
    <div class="row">

      {!! Form::open(['method'=>'POST','action'=>['AdminPostsController@store'], 'files'=>true]) !!}

             {!! Form::label('Title') !!}
             {!! Form::text('title',null, ['class'=>'form-control']) !!}
             {!! Form::hidden('_method','POST') !!}
             {!! Form::label('category','Category') !!}
             {!! Form::select('category_id',[''=>'Choose Option'],'', ['class'=>'form-control']) !!}
             {!! Form::label('photo_id','Photo') !!}
             {!! Form::file('photo_id') !!}
             {!! Form::label('body','Description:') !!}
             {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>'3']) !!}
             {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}

      {!! Form::close() !!}
    </div>

    <div class="row">
        @include('includes.form_errors')
    </div>


@stop
@section('footer')







@stop



