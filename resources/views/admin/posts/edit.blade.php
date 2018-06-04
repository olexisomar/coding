@extends('layouts.admin')







@section('content')



    <h1>Edit Post</h1>

    <div class="row">

        {!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}

        {!! Form::label('Title') !!}
        {!! Form::text('title',null, ['class'=>'form-control']) !!}
        {{--{!! Form::hidden('_method','PATCH') !!}--}}
        {!! Form::label('category','Category') !!}
        {!! Form::select('category_id',[''=>'Choose Option'] + $cat,null, ['class'=>'form-control']) !!}
        {!! Form::label('photo_id','Photo') !!}
        {!! Form::file('photo_id')!!}
        {!! Form::label('body','Description:') !!}
        {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>'3']) !!}
        {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>

    <div class="row">
        @include('includes.form_errors')
    </div>

@stop
@section('footer')







@stop



