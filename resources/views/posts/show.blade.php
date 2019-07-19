@extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn-default">Go back</a>
<h3>{{$post->title}}</h3>
<img class="img-responsive" src="/storage/cover_images/{{$post->cover_image}}" alt="">
<br><br>
<div>
    {!! $post->body !!}
</div>
<hr>
<small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
<hr>
@auth
@if(Auth::user()->id == $post->user_id)
<a href="/posts/{{$post->id}}/edit" class="btn btn-success">Edit</a>
{!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => ['pull-right', 'delete']]) !!}
{{Form::hidden('_method', 'DELETE')}}
{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
{!! Form::close() !!}
@endif
@endauth
&nbsp;

&nbsp;
<div style="padding-bottom:40px;"></div>
<script>
    $(".delete").on("submit", function() {
        return confirm("Do you want to delete this post?");
    });
</script>
@endsection