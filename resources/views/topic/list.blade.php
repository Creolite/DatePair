@extends('home')

@section('content')
    <div class="home-tab clearfix">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#knowledge_tab"> All Topics ({{count($topics)}})</a></li>
    </ul>

    <div class="tab-content">
        <div id="knowledge_tab" class="tab-pane fade in active">
            <aside class="topic-list">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                    <div class="panel panel-default">
                        @foreach($topics as $topic)
                            <article class="well btn-group-sm clearfix">

                                {{-- Topic card --}}
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <div class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$topic->id}}" aria-expanded="false" aria-controls="collapseTwo">
                                            <header class="topic-title clearfix">
                                                <h3>{{$topic->title}}</h3>
                                                <small><strong>Posted: {{$topic->created_at->diffForHumans()}}</strong></small>
                                            </header>
                                        </a>
                                    </div>
                                </div>

                                {{-- Topic detail (collapsible) --}}
                                <div id="collapse{{$topic->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <div class="topic-meta clearfix">
                                            <div class="pull-left">
                                                <span class="">{{$topic->likes}}</span>
                                                <a class="btn btn-default btn-fab btn-fab-mini" href="#" data-toggle="tooltip" data-placement="bottom" title="Like">
                                                    <i class="material-icons" style="color: green">thumb_up</i>
                                                </a>
                                                <a class="btn btn-default btn-fab btn-fab-mini" href="#" data-toggle="tooltip" data-placement="bottom" title="Unlike">
                                                    <i class="material-icons" style="color: #ff6666">thumb_down</i>
                                                </a>
                                                <span class="">{{$topic->unlikes}}</span>
                                            </div><!-- end left -->

                                            <div class="pull-right">
                                                <a title="{{ $n = count($topic->comments) }} comment{{ _s($n) }}" class="btn btn-default btn-fab btn-fab-mini" href="#" data-toggle="tooltip" data-placement="bottom">
                                                    <i class="material-icons">comment</i>
                                                </a> {{ $n }}
                                                &emsp;
                                                <a title="Bookmark" class="btn btn-default btn-fab btn-fab-mini" href="#" data-toggle="tooltip" data-placement="bottom">
                                                    <i class="material-icons">bookmark_border</i>
                                                </a>
                                            </div><!-- end right -->
                                        </div><!-- end topic-meta -->

                                        <div class="topic-desc row-fluid clearfix">
                                            <div class="col-sm-2">
                                                <img src="{{url('assets/images/uploads/team_02.jpg')}}" alt="" class="avatar img-circle img-responsive">
                                            </div>
                                            <div class="col-sm-10">
                                                <h4>{{$topic->description}}</h4>

                                                <a href="{{ route('topic', ['topic' => $topic->title_slug])}}" class="readmore" title="">Continue reading →</a>
                                            </div>
                                        </div><!-- end tpic-desc -->

                                        <footer class="topic-footer clearfix">
                                            {{-- Tags --}}
                                            <div class="pull-left">
                                                <ul class="list-inline tags">
                                                    <li><a href="#">Bootstrap</a></li>
                                                    <li><a href="#">Web Design</a></li>
                                                    <li><a href="#">Framework</a></li>
                                                </ul>
                                            </div>

                                            {{-- Share --}}
                                            <div class="pull-right">
                                                <div class="customshare">
                                                    <div class="list">
                                                        <div class="btn btn-default btn-fab btn-fab-mini"><i class="material-icons">share</i>
                                                            <ul class="list-inline">
                                                                <li><a href="#" class="tw"><i class="fa fa-twitter"></i></a></li>
                                                                <li><a href="#" class="fb"><i class="fa fa-facebook"></i></a></li>
                                                                <li><a href="#" class="gp"><i class="fa fa-google-plus"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </footer><!-- end topic -->
                                    </div><!-- end panel-body -->
                                </div><!-- end panel-collapse -->
                            </article><!-- end article well -->
                        @endforeach

                        @if( count($topics) )
                            @include( 'components.pagination' )

                        @else
                            @include( 'topic.empty' )

                        @endif

                    </div><!-- end panel -->

                </div>
            </aside>
        </div>
    </div>
</div>
@endsection
