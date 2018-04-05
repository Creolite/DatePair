{{-- Topic title card --}}
<article class="well link btn-group-sm clearfix">
    <div class="panel-title">
        <div class="row-fluid clearfix">
            <div class="col-xs-2 col-sm-1">
                @include('user.avatar', [ 'props' => ['image'] ])
            </div>
            <div class="col-sm-10">
                <a href="{{ route('topic', ['topic' => $topic->name_slug])}}" class="readmore" title="Read more">
                    <header class="topic-title clearfix">
                        <h3>{{$topic->name}}</h3>
                    </header>
                    <small><strong>Posted: {{$topic->created_at->diffForHumans()}}</strong></small>
                </a>
            </div>
        </div>
    </div>
</article>