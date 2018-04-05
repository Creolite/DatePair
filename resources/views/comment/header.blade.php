{{-- Comment header --}}
<div class="panel-title">
    <div class="col-xs-1 img-tiny">
        @include('user.avatar', ['post' => $comment, 'props' => ['image'] ])
    </div>
    <a href="{{ route('user.show', ['user' => $comment->user_id]) }}">
        <strong>{{$comment->user->name}}</strong>&nbsp;
    </a>
    <span> replied {{$comment->created_at->diffForHumans()}}</span>
    <div style="border-bottom:solid 1px #eeeeee; margin-top: 10px;"></div>
</div>
