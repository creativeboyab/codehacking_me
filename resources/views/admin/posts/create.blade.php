@extends('layouts.admin')

@section('content')
    <h1>Create Post</h1>

    {!! Form::open([ 'method' => 'POST', 'action' => 'AdminPostsController@store', 'files' => true ]) !!}
        {{-- Title --}}
        <div class="form-group">
            {!! Form::label('title', 'Post Title:'); !!}
            {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => '']); !!}
        </div>
        {{-- Category --}}
        <div class="form-group">
            {!! Form::label('category_id', 'Category:'); !!}
            {!! Form::select('category_id', ['' => 'Choose Category'] + $categories, null, ['class' => 'custom-select', 'id' => 'category_id']) !!}
        </div>
        {{-- Body --}}
        <div class="form-group">
            {!! Form::label('body', 'Post Content:'); !!}
            {!! Form::textarea('body', null, ['class' => 'form-control', 'id' => 'body', 'placeholder' => '']); !!}
        </div>
        {{-- Photo --}}
        <div class="form-group">
            {!! Form::label('photo_id', 'Post Image:'); !!}
            {!! Form::file('photo_id', ['class' => 'form-control-file', 'id' => 'photo_id']); !!}
        </div>
        {!! Form::submit('Create New Post', ['class' => 'btn btn-primary btn-block']); !!}
    {!! Form::close() !!}
    @include('includes.form_error');
@endsection

@section('scripts')
    @include('includes.tinyEditor');
@endsection