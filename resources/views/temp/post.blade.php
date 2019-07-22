<!-- post.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <br />
        @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
        @endif
        @foreach($posts as $post)
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->body }}</p>
        <div>
            <strong>Tag:</strong>
            @foreach($post->tags as $tag)
            <label class="label label-info">{{ $tag->name }}</label>
            @endforeach
        </div>
        @endforeach
    </div>
</body>

</html>