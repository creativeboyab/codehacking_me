@extends('layouts.admin')

@section('content')
    <br>
    <h1>Edit Category #{{$category->id}}</h1>
    <hr>
    <br>
    {!! Form::model($category, [ 'method' => 'PATCH', 'action' => ['AdminCategoriesController@update', $category->id] ]) !!}
        {{-- Type: text/url/email/number--}}
        <div class="form-group">
            {!! Form::label('name', 'Category Name:'); !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => '']); !!}
        </div>
        {!! Form::submit('Create New Category', ['class' => 'btn btn-primary btn-block']); !!}
    {!! Form::close() !!}
    @include('includes.form_error')
    <br>
    <hr>
    <br>
    {!! Form::model($category, [ 'method' => 'DELETE', 'action' => ['AdminCategoriesController@update', $category->id] ]) !!}
        {!! Form::submit('Delete Create', ['class' => 'btn btn-danger btn-block']); !!}
    {!! Form::close() !!}
@endsection