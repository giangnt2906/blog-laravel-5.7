@foreach($comments as $comment)
<div class="display-comment" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
    <strong>{{ $comment->user->name }}</strong>
    <p>{{ $comment->body }}</p>
    <a href="" id="reply"></a>
    <form method="post" action="{{ route('reply.add') }}">
        @csrf
        @csrf
        <div class="form-group">
            <input type="text" name="comment_body" class="form-control" />
            <input type="hidden" name="post_id" value="{{ $post->id }}" />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-warning" value="Add Comment" />
        </div>
    </form>
    @include('posts.commentsDisplay', ['comments' => $comment->replies])
</div>
@endforeach