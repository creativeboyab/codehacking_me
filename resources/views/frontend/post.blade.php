@extends('layouts.blog-post')

@section('content')
    <!-- Title -->
    <h1>{{$post->title}}</h1>
    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>
    <hr>
    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>
    <hr>

    <!-- Preview Image -->
    @if($post->photo)
        <img width="100%" class="img-responsive" src="{{$post->photo->file}}" alt="">
    @endif
    <hr>
    <!-- Post Content -->
    <p>{!! $post->body !!}</p>
    <hr>

    <!-- Blog Comments -->
    @if(Auth::check())
    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>
        @if(Session::has('comment_message'))
            <p>{{session('comment_message')}}</p>
        @endif
        {!! Form::open([ 'method' => 'POST', 'action' => 'AdminCommentsController@store' ]) !!}
            <input type="hidden" name="post_id" value="{{$post->id}}">
            {{-- Comment --}}
            <div class="form-group">
                {!! Form::label('body', 'Comment:'); !!}
                {!! Form::textarea('body', null, ['class' => 'form-control', 'id' => 'body', 'rows' => '3']); !!}
            </div>
            {!! Form::submit('Submit Comment', ['class' => 'btn btn-primary btn-block']); !!}
        {!! Form::close() !!}
    </div>
    <hr>
    @else
        <div class="text-center">
            <b>Only Login User Can Able To Comment Here</b>
        </div>
        <hr>
    @endif

    <!-- Posted Comments -->
    @if(count($comments) > 0)
        @if(Session::has('reply_message'))
            <p>{{session('reply_message')}}</p>
        @endif
    <!-- Comment -->
        @foreach($comments as $comment)
            <div class="media">
                <a class="pull-left" href="#">
                    @if($comment->photo)
                        <img width="70" class="media-object" src="{{$comment->photo}}" alt="">
                    @elseif($comment->email)
                        <img width="70" class="media-object" src="http://www.gravatar.com/avatar/{{md5(strtolower(trim($comment->email))) . "?d=identicon"}}" alt="">
                    @else
                        nothing
                    @endif
                        {{--                    <img width="70" class="media-object" src="{{$comment->photo ? $comment->photo  : Auth::user()->gravatar}}" alt="">--}}

                </a>
                <div class="media-body">
                    <div class="primary-reply">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at->diffForHumans()}}</small>
                            <div class="comment-primary-reply-container">
                                <span class="toggle-reply"> | Reply</span>
                            </div>
                        </h4>
                    </div>
                    {{$comment->body}}
                    <div class="comment-reply">
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::open([ 'method' => 'POST', 'action' => 'AdminCommentReplyController@createReply' ]) !!}
                                <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                <div class="form-group">
                                    {!! Form::label('body', 'Comment:'); !!}
                                    {!! Form::textarea('body', null, ['class' => 'form-control', 'id' => 'body', 'rows' => '2']); !!}
                                </div>
                                {!! Form::submit('Reply', ['class' => 'btn btn-primary btn-block']); !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    @if(count($comment->replies) > 0)
                        @foreach($comment->replies as $reply)
                            @if($reply->is_active == 1)
                            <!-- Nested Comment -->
                            <div class="media">
                                <div class="nested-comment">
                                    <div class="row">
                                        <div class="col-md-2 text-right">
                                            <a class="pull-left" href="#">
                                                <img width="70" class="media-object" src="{{$reply->photo ? $reply->photo : '/images/default_user.png'}}" alt="">
                                            </a>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    {{$reply->author}}
                                                    <small>{{$reply->created_at->diffForHumans()}}</small>
                                                    <div class="comment-reply-container">
                                                        <span class="toggle-reply"> | Reply</span>
                                                    </div>
                                                </h4>
                                                {{$reply->body}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-reply">
                                    <div class="row">
                                        <div class="col-md-10 offset-md-2">
                                            {!! Form::open([ 'method' => 'POST', 'action' => 'AdminCommentReplyController@createReply' ]) !!}
                                            <input type="hidden" name="comment_id" value="{{$comment->id}}">
                                            <div class="form-group">
                                                {!! Form::label('body', 'Comment:'); !!}
                                                {!! Form::textarea('body', null, ['class' => 'form-control', 'id' => 'body', 'rows' => '2']); !!}
                                            </div>
                                            {!! Form::submit('Reply', ['class' => 'btn btn-primary btn-block']); !!}
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    @endif
                    <!-- End Nested Comment -->
                </div>
            </div>
        @endforeach
    @else
        <div class="text-center">
            <b>No Comment</b>
        </div>
    @endif
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).on("click", ".comment-reply-container .toggle-reply", function(event){
            event.preventDefault();
            $(this).closest('.nested-comment').next('.comment-reply').toggle();
        });
        $(document).on("click", ".comment-primary-reply-container .toggle-reply", function(event){
            event.preventDefault();
            $(this).closest('.primary-reply').next('.comment-reply').toggle();
        });

    </script>
@endsection
