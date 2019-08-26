@extends('layouts.admin')

@section('content')
    <h1>User</h1>
    {!! Form::open([ 'method' => 'POST', 'action' => 'AdminUsersController@store', 'files' => true]) !!}
        {{-- Name --}}
        <div class="form-group">
            {!! Form::label('name', 'User Name:'); !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => '']); !!}
        </div>
        {{-- Email --}}
        <div class="form-group">
            {!! Form::label('email', 'Email:'); !!}
            {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => '']); !!}
        </div>
        {{-- Password --}}
        <div class="form-group">
            {!! Form::label('password', 'Password:'); !!}
            {!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => '']); !!}
        </div>
        <div class="form-group">
            {!! Form::label('role_id', 'Role:'); !!}
            {!! Form::select('role_id', ['' => 'Choose Options'] + $roles, null, ['class' => 'custom-select', 'id' => 'role_id']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('is_active', 'Status:'); !!}
            {!! Form::select('is_active', [0 => 'In Active', 1 => 'Active'], null, ['class' => 'custom-select', 'id' => 'preferenceselect']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo_id', 'Profile Picture:'); !!}
            {!! Form::file('photo_id', ['class' => 'form-control-file', 'id' => 'photo_id']); !!}
        </div>
        {!! Form::submit('submit', ['class' => 'btn btn-primary btn-block']); !!}
    {!! Form::close() !!}
    @include('includes.form_error');
@endsection