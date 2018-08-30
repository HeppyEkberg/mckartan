<p>Kommentarer</p>
@foreach($comments as $comment)
    <div class="comment">
        <div class="comment-body">
            <div class="comment-header d-flex flex-wrap justify-content-between">
                <div class="row">
                    <div class="col-sm-6"><strong>{{ $comment->user->name }}</strong></div>
                    <div class="col-sm-6 text-right"><i class="fas fa-comment"></i></div>
                </div>
            </div>
            <p class="comment-text">{{ $comment->body }}</p>
        </div>
    </div>
@endforeach

<div class="text-right">
    <a href="" class="btn btn-default btn-xs">Kommentera</a>
</div>

