@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger" data-dismiss="alert">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert alert-success" data-dismiss="alert">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger" data-dismiss="alert">
        {{session('error')}}
    </div>
@endif