<div class="tab-content">
    <div id="knowledge_tab" class="tab-pane fade in active">
        <aside class="topic-list">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                <div class="panel panel-default">
                    <article class="well bare no-ease btn-group-sm clearfix">
                        <div class="panel-heading">
                            @include('comment.header')
                        </div>
                        <div class="clearfix"></div>

                        <div class="container-fluid mt-3">
                            {{-- Comments --}}
                            <div class="comments">
                                {{ $comment->comment }}
                            </div>
                            {{-- Meta --}}
                            @include('components.thumb-icons', [ 'post' => $comment, 'replies' => 'replies' ])
                            {{-- Replies --}}
                            <div id="collapse{{$comment->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                All replies
                            </div>
                        </div>
                    </article>
                </div>

            </div>
        </aside>
    </div>
</div>
