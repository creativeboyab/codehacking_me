@if(count($errors) > 0)
    <div class="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li class="alert alert-danger">{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif