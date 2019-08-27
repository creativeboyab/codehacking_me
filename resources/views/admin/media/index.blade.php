@extends('layouts.admin')

@section('content')
    <h1>MEDIA</h1>
    @if($photos)
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Image</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($photos as $photo)
                        <tr>
                            <th scope="row">{{$photo->id}}</th>
                            <td><img width="100" src="{{$photo->file}}" alt=""></td>
                            <td>{{$photo->created_at->diffForHumans()}}</td>
                            <td>{{$photo->updated_at->diffForHumans()}}</td>
                            <td>
                                {!! Form::model($photo, [ 'method' => 'DELETE', 'action' => ['AdminMediaController@destroy', $photo->id] ]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']); !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection