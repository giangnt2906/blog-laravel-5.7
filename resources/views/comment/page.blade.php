@extends('layouts.app')

@section('content')
<link href="css/comment.css" rel="stylesheet" type="text/css">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Example Page {{ $postId }}</div>

                <div class="panel-body">
                    This is an example page

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" style="background:white;">
            <div comment-url="{{ $postId }}"></div>
        </div>
    </div>
</div>
@endsection