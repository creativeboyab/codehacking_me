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
        @include('includes.comments.disqusComments')
{{--    @include('includes.comments.regularComment')--}}
@endsection

{{--@section('scripts')--}}
{{--    <script type="text/javascript">--}}
{{--        $(document).on("click", ".comment-reply-container .toggle-reply", function(event){--}}
{{--            event.preventDefault();--}}
{{--            $(this).closest('.nested-comment').next('.comment-reply').toggle();--}}
{{--        });--}}
{{--        $(document).on("click", ".comment-primary-reply-container .toggle-reply", function(event){--}}
{{--            event.preventDefault();--}}
{{--            $(this).closest('.primary-reply').next('.comment-reply').toggle();--}}
{{--        });--}}

{{--    </script>--}}
{{--@endsection--}}
