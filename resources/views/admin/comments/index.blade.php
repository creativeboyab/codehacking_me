@extends('layouts.admin')

@section('content')
    <h1>Comments</h1>
    @if(count($comments) > 0)
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Id</th>
          <th scope="col">Post</th>
          <th scope="col">Author</th>
          <th scope="col">Email</th>
          <th scope="col">Body</th>
          <th scope="col">Status</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($comments as $comment)
        <tr>
          <th scope="row">{{$comment->id}}</th>
          <td>{{$comment->post->title}}<br><a href="{{route('home.post', $comment->post->slug)}}" target="_blank">View Post</a> | <a href="{{route('admin.comment.replies.show', $comment->id)}}" target="_blank">View Replies</a></td>
          <td>{{$comment->author}}</td>
          <td>{{$comment->email}}</td>
          <td>{{$comment->body}}</td>
          <td>
            @if($comment->is_active == 1)
              {!! Form::model($comment, [ 'method' => 'PATCH', 'action' => ['AdminCommentsController@update', $comment->id] ]) !!}
                <input type="hidden" name="is_active" value="0">
                {!! Form::submit('Unapproved', ['class' => 'btn btn-success btn-block']); !!}
              {!! Form::close() !!}
            @else
              {!! Form::model($comment, [ 'method' => 'PATCH', 'action' => ['AdminCommentsController@update', $comment->id] ]) !!}
                <input type="hidden" name="is_active" value="1">
                {!! Form::submit('Approved', ['class' => 'btn btn-info btn-block']); !!}
              {!! Form::close() !!}
            @endif
          </td>
          <td>
            {!! Form::model($comment, [ 'method' => 'DELETE', 'action' => ['AdminCommentsController@destroy', $comment->id] ]) !!}
              {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']); !!}
            {!! Form::close() !!}
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @else
      <h1 class="text-center">No Comments</h1>
    @endif
@endsection