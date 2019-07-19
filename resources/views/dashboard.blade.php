@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <!-- You are logged in!
                    <hr> -->
                    <a href="/posts/create" class="btn btn-success">Create New Post</a>
                    <h3>Your Blog Posts</h3>

                    <table class="table table-striped">
                        @if(count($posts) > 0)
                            <tr>
                                <th>Title</th>
                                <th>Body</th>
                                <th></th>
                                <th></th>
                            </tr>    
                                @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td>{!! $post->body !!}</td>
                                    <td>
                                        <a href="/posts/{{$post->id}}/edit" class="btn btn-warning">Edit</a>
                                    </td>
                                    <td>
                                        {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => ['pull-right', 'delete']]) !!}
                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                        @else
                            <hr>
                            <p>No Posts Found</p>        
                        @endif    
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(".delete").on("submit", function() {
        return confirm("Do you want to delete this post?");
    });
</script>
@endsection