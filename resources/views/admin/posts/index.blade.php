@extends('layouts.admin')

@section('content')
    <h1>Posts</h1>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Photo</th>
          <th scope="col">Title</th>
          <th scope="col">Body</th>
          <th scope="col">User</th>
          <th scope="col">Category</th>
          <th scope="col">Comment</th>
          <th scope="col">Created</th>
          <th scope="col">Updated</th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $post)
          <tr>
            <th scope="row">{{$post->id}}</th>
            <td><img width="100" src="{{$post->photo ? $post->photo->file : '/images/default_post.jpg'}}" alt=""></td>
            <td>{{$post->title}} <br> <a href="{{route('admin.posts.edit', $post->id)}}">Edit</a> | <a href="{{route('home.post', $post->slug)}}" target="_blank">View Post</a></td>
            <td>{{str_limit($post->body, 30)}}</td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
            <td><a href="{{route('admin.comments.show', $post->id)}}">View Comment</a></td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
          </tr>
        @endforeach

      </tbody>
    </table>
    <div class="row">
      <div class="col-md-12 text-center">
        <nav aria-label="Page navigation" class="admin-navigation">
          {{$posts->links()}}
        </nav>

      </div>
    </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    $( ".admin-navigation .pagination" ).addClass( "justify-content-center" );
    $( ".pagination li span" ).addClass( "page-link" );
    $( ".pagination li a" ).addClass( "page-link" );
  </script>
@endsection