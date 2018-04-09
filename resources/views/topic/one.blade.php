@extends('home')

@section('content')
<div class="well well-lg">
    <div class="row">
        {{-- Nav Buttons --}}
        @include('components.nav-buttons')
        {{-- Author --}}
        <div class="col-xs-2">
            @include('user.avatar', ['props' => ['name', 'image'] ])
        </div>

        {{-- Topic detail --}}
        <div class="col-xs-10">
            {{-- Heading --}}
            <div class="clearfix" style="margin-left: 15px;">
                <h1>{{$topic->title}}</h1>
                <small class="">
                    Created: &emsp;<strong>{{$topic->created_at->diffForHumans()}}</strong>
                </small>
                <br/><br/>
                <div class="row col-xs-10">
                    {{$topic->description}}
                </div>
            </div>
            <hr/>

            {{-- Meta --}}
            @include('components.thumb-icons', [ 'post' => $topic, 'replies' => 'comments' ])

            {{-- Comments --}}
            <div class="topic-meta clearfix">
                <h3>Comments</h3>
                @each('comment.one', $topic->comments, 'comment')
            </div>
        </div>
    </div>

    {{-- Footer --}}
    <footer class="topic-footer clearfix">
        {{-- Tags --}}
        <div class="pull-left">
            <ul class="list-inline tags">
                <li><a href="#">Bootstrap</a></li>
                <li><a href="#">Web Design</a></li>
                <li><a href="#">Framework</a></li>
            </ul>
        </div>
    </footer>
</div>
@endsection