@extends('layouts.admin')

@section('content')
    @if($replies)
        <h1>Replies</h1>
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
            @foreach($replies as $reply)
                <tr>
                    <th scope="row">{{$reply->id}}</th>
                    <td><a href="{{route('home.post', $reply->comment->post->id)}}" target="_blank">{{$reply->comment->post->title}}</a></td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    <td>
                        @if($reply->is_active == 1)
                            {!! Form::model($reply, [ 'method' => 'PATCH', 'action' => ['AdminCommentReplyController@update', $reply->id] ]) !!}
                            <input type="hidden" name="is_active" value="0">
                            {!! Form::submit('Unapproved', ['class' => 'btn btn-success btn-block']); !!}
                            {!! Form::close() !!}
                        @else
                            {!! Form::model($reply, [ 'method' => 'PATCH', 'action' => ['AdminCommentReplyController@update', $reply->id] ]) !!}
                            <input type="hidden" name="is_active" value="1">
                            {!! Form::submit('Approved', ['class' => 'btn btn-info btn-block']); !!}
                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>
                        {!! Form::model($reply, [ 'method' => 'DELETE', 'action' => ['AdminCommentReplyController@destroy', $reply->id] ]) !!}
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