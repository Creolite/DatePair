{{-- Thumb Icons --}}
<div class="topic-meta clearfix">
    <div class="thumb-icons">
        <div class="pull-left">
            {{-- Like --}}
            <a class="btn btn-default btn-fab btn-fab-mini" href="#" data-toggle="tooltip" data-placement="bottom" title="Like">
                <i class="material-icons" style="color: green">thumb_up</i>
            </a>
            <span class="icon-label left">{{$post->likes}}</span>
            {{-- Unlike --}}
            <a class="btn btn-default btn-fab btn-fab-mini" href="#" data-toggle="tooltip" data-placement="bottom" title="Unlike">
                <i class="material-icons" style="color: #ff6666">thumb_down</i>
            </a>
{{--            <span class="icon-label left">{{$post->dislikes}}</span>--}}
            <span class="icon-label left">{{$post->unlikes}}</span>
            {{-- Comments count --}}
            @if($replies == 'comments')
                <span class="btn btn-default btn-fab btn-fab-mini" data-toggle="tooltip" data-placement="bottom" title="View {{$replies}}">
                    {{-- Toggle --}}
                    <a class="collapsed btn btn-default btn-fab btn-fab-mini" role="button" data-toggle="collapse"
                       data-parent="#accordion" aria-expanded="false" aria-controls="collapseTwo"
                       href="#collapse{{$post->id}}" data-placement="bottom" title="View {{$replies}}">
                        <i class="material-icons" style="color: #0055ff">comment</i>
                    </a>
                </span>
            @else
                {{-- Toggle --}}
                <a class="btn btn-default btn-fab btn-fab-mini" href="#" data-toggle="tooltip" data-placement="bottom" title="View {{$replies}}">
                    <i class="material-icons" style="color: #0055ff">comment</i>
                </a>
                {{--<a title="{{ $n = count($topic->comments) }} comment{{ _s($n) }}" class="btn btn-default btn-fab btn-fab-mini" href="#" data-toggle="tooltip" data-placement="bottom">
                    <i class="material-icons">comment</i>
                </a> {{ $n }}--}}
            @endif
            <span class="icon-btn">
                @if(isset($post->$replies))
                    {{ count($post->$replies) }}
                @else
                    0
                @endif
            </span>
        </div>

        <div class="icon-label right pull-right">
            {{-- Bookmark --}}
            <a title="Bookmark" class="btn btn-default btn-fab btn-fab-mini" href="#" data-toggle="tooltip" data-placement="bottom">
                <i class="material-icons" style="color: #52143d">bookmark_border</i>
            </a>
        </div>
        <div class="icon-label right pull-right">
            {{-- Share --}}
            <div class="customshare">
                <div class="list">
                    <div class="btn btn-default btn-fab btn-fab-mini" title="Share" data-toggle="tooltip" data-placement="bottom">
                        <i class="material-icons" style="color: #99bbff">share</i>
                        <ul class="list-inline">
                            <li><a href="#" class="tw"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="fb"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="gp"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.btn-fab').click(function (e) {
                $(this).blur();
            });
        });
    </script>
@endpush