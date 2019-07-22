@extends('layouts.app')

@section('content')
<h3>Posts</h3>

@if(count($posts) > 0)
@foreach($posts as $post)
<div class='well'>
    <div class="row">
        <div class="col-sm-4">
            <img class="img-responsive" src="/storage/cover_images/{{$post->cover_image}}" alt="">
        </div>
        <div class="col-sm-8">
            <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
            <p>{!! $post->body !!}</p>
            <hr>
            <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
            <div>
                <strong>Tag:</strong>
                @foreach($post->tags as $tag)
                <label class="label label-info">{{ $tag->name }}</label>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endforeach
{{$posts->links()}}
@else
<p>No posts found</p>
@endif

@endsection