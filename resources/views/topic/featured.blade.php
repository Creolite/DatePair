<div class="home-tab clearfix">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#knowledge_tab"> Featured Topics ({{count($topics)}})</a></li>
    </ul>

    <div class="tab-content">
        <div id="knowledge_tab" class="tab-pane fade in active">
            <aside class="topic-list">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                    <div class="panel panel-default">
                        @each('topic.titleCard', $topics, 'topic', 'topic.empty')

                        @includeWhen( count($topics), 'components.pagination' )
                    </div>

                </div>
            </aside>
        </div>
    </div>
</div>