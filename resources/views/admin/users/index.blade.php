@extends('layouts.admin')

@section('content')
    <h1>Users</h1>
    @if(Session::has('deleted_user'))
        <div class="alert alert-info">{{session('deleted_user')}}</div>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
            <th>photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
            <th>Create At</th>
            <th>Update At</th>
            <th>Role</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td><img height="50" src="{{$user->photo ? $user->photo->file : '/images/default_user.png'}}" alt=""></td>
                <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>{{$user->is_active == 1 ? 'Active' : 'Inactive'}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
                <td>{{$user->role ? $user->role->name : 'User Has No Role'}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection