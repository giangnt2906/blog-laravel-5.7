@extends('layouts.app')

@section('content')
<a href="/dashboard" class="btn btn-default"> Go back</a>
<h3>Create Post</h3>
<div style="padding-bottom:20px"></div>

{!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'files' => true]) !!}
<div class="form-group">
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title']) }}
</div>
<div class="form-group">
    {{ Form::label('body', 'Body') }}
    {{ Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text']) }}
</div>
<div class="form-group ">
    <div class="file btn btn-lg btn-success" class="position:relative; overflow:hidden;">
        Upload image
        <input type="file" id="upload" onchange="readURL(this);" name="cover_image" style="opacity:0; position:absolute; right:1220px; top:720px; font-size:30px; width: 145px">
    </div>
    <img id="img" src="/storage/cover_images/noimage.jpg" alt="your image" style="height:270px; width:480px;" />
</div>

{{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
<a href="/posts" class="btn btn-warning pull-right">Cancel</a>
<br><br>
<script>
    var imgFullName = "";

    function readURL(input) {
        var url = input.value;
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#img').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
            imgFullName = input.files[0].name;
        } else {
            $('#img').attr('src', '/storage/cover_images/noimage.jpg');
        }
    }
</script>
{!! Form::close() !!}

@endsection