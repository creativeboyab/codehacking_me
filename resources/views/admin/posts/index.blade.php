@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Photo</th>
          <th scope="col">User Id</th>
          <th scope="col">Category Id</th>
          <th scope="col">Title</th>
          <th scope="col">Body</th>
          <th scope="col">Created At</th>
          <th scope="col">Updated At</th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $post)
          <tr>
            <th scope="row">{{$post->id}}</th>
            <td><img width="100" src="{{$post->photo ? $post->photo->file : '/images/default_post.jpg'}}" alt=""></td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
          </tr>
        @endforeach

      </tbody>
    </table>
@endsection