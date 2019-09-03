@extends('layouts.admin')

@section('content')
    <h1>MEDIA</h1>
    <br>
    @if($photos)
        <div class="row">
            <div class="col-sm-12">
                {!! Form::open([ 'method' => 'POST', 'route' => 'admin.media.delete' ]) !!}
                {{method_field('delete')}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <select class="custom-select" id="checkboxArray" name="checkboxSelectArray">
                                <option value="">Delete</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        {!! Form::submit('Submit', ['class' => 'btn btn-primary btn-block', 'name' => 'delete_all']); !!}
                    </div>
                </div>
                <br>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>
                            <div class="custom-control custom-checkbox">
                                {!! Form::checkbox('checkbox', null, null, ['class' => 'custom-control-input', 'id' => 'options']); !!}
                                {!! Form::label('options' . $photo->id, ' ', ['class' => 'custom-control-label']); !!}
                            </div>
                        </th>
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
                            <td>
                                <div class="custom-control custom-checkbox">
                                    {!! Form::checkbox('checkboxArray[]', $photo->id, null, ['class' => 'custom-control-input checkboxArray', 'id' => 'checkboxArray' . $photo->id]); !!}
                                    {!! Form::label('checkboxArray' . $photo->id, ' ', ['class' => 'custom-control-label']); !!}
                                </div>
                            </td>
                            <th scope="row">{{$photo->id}}</th>
                            <td><img width="100" src="{{$photo->file}}" alt=""></td>
                            <td>{{$photo->created_at->diffForHumans()}}</td>
                            <td>{{$photo->updated_at->diffForHumans()}}</td>
                            <td>
                                {!! Form::hidden('photo', $photo->id, ['class' => '', 'id' => '', 'placeholder' => '']); !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block', 'name' => 'delete_single']); !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! Form::close() !!}
            </div>
        </div>
    @endif
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('#options').click(function(){
                if(this.checked){
                    $('.checkboxArray').each(function () {
                        this.checked = true
                    })
                }else{
                    $('.checkboxArray').each(function () {
                        this.checked = false
                    })
                }
            });
        });
    </script>
@endsection