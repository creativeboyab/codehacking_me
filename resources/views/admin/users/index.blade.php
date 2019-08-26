@extends('layouts.admin')

@section('content')
    <h1>Users</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Id</th>
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
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->is_active == 1 ? 'Active' : 'Inactive'}}</td>
                <td>{{$user->created_at->diffForHumans()}}</td>
                <td>{{$user->updated_at->diffForHumans()}}</td>
                <td>
                    @if($user->role_id == 1)
                        administrator
                    @elseif($user->role_id == 2)
                        author
                    @elseif($user->role_id == 3)
                        subscriber
                    @else()

                    @endif()
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection