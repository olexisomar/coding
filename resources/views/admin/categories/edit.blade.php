@extends('layouts.admin')







@section('content')
<h1>Edit Category</h1>
{!! Form::model($cat,['method'=>'PATCH','action'=>['AdminCategoryController@update', $cat->id]]) !!}

{!! Form::label('Category Title') !!}
{!! Form::text('name',null, ['class'=>'form-control']) !!}
{!! Form::hidden('_method','PATCH') !!}
{!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}

{!! Form::close() !!}





@stop
@section('footer')







@stop



