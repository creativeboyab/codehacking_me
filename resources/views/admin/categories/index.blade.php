@extends('layouts.admin')

@section('content')
    <h1>Category</h1>
    @if(Session::has('category_delete'))
        <div class="alert alert-info">{{session('category_delete')}}</div>
    @endif
    <div class="row">
        <div class="col-sm-6">
            {!! Form::open([ 'method' => 'POST', 'action' => 'AdminCategoriesController@store' ]) !!}
                {{-- Type: text/url/email/number--}}
                <div class="form-group">
                    {!! Form::label('name', 'Category Name:'); !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => '']); !!}
                </div>
                {!! Form::submit('Create New Category', ['class' => 'btn btn-primary btn-block']); !!}
            {!! Form::close() !!}
            @include('includes.form_error')
        </div>
        <div class="col-sm-6">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <th scope="row">{{$category->id}}</th>
                        <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                        <td>{{$category->created_at->diffForHumans()}}</td>
                        <td>{{$category->updated_at->diffForHumans()}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection