@extends('layouts.admin')

@section('content')
    <h1>Create Post #{{$post->id}}</h1>
    <img height="200" src="{{$post->photo ? $post->photo->file : '/images/default_post.jpg'}}" alt="">
    <div class="row">
        <div class="col-md-12">
        {!! Form::model($post, [ 'method' => 'PATCH', 'action' => ['AdminPostsController@update', $post->id], 'files' => true ]) !!}
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
            {!! Form::submit('Update Post', ['class' => 'btn btn-primary btn-block']); !!}
        {!! Form::close() !!}
        <br>
        <br>
        <hr>
        <br>
        <br>
        {!! Form::model($post, [ 'method' => 'DELETE', 'action' => ['AdminPostsController@destroy', $post->id] ]) !!}
            {!! Form::submit('Delete Post', ['class' => 'btn btn-danger btn-block']); !!}
        {!! Form::close() !!}
        </div>
    </div>
    @include('includes.form_error');
@endsection

@section('scripts')
    @include('includes.tinyEditor');
@endsection