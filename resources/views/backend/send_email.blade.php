@extends('layouts.app')

@section('content')
<div class="box">
    <!-- @if(count($errors)>0)
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif -->

    <!-- @if($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>{{ $message }}</strong>
    </div>
    @endif -->

    <form action="{{ url('send_email/send') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Enter your name</label>
            <input type="text" name="name" class="form-control" />
        </div>
        <div class="form-group">
            <label for="email">Enter your email</label>
            <input type="text" name="email" class="form-control" />
        </div>
        <div class="form-group">
            <label for="message">Enter your message</label>
            <textarea name="message" id="" cols="" rows="" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info">Send</button>
        </div>
    </form>
</div>
@endsection