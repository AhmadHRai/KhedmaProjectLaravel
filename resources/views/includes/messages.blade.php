@if($errors->any())

    <div class="alert alert-danger text-center">
        <ul>
            @foreach ($errors->all() as $error)
                 <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('status'))

    <div class="alert alert-success text-center">
        <ul>
                 <li>{{session('status')}}</li>
        </ul>
    </div>
@endif

@if(session('errors2'))

    <div class="alert alert-danger text-center">
        <ul>
                 <li>{{session('errors2')}}</li>
        </ul>
    </div>
@endif