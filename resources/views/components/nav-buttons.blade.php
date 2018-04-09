{{-- Ubuntu Nav Buttons: [back] [close] etc --}}
{{--
    Component-based Design:
    Have a $size variable that determines the font-size of the icons, passed from
    the caller. General CSS may then be overridden based on particular use-cases.

    E.g:
    @php if(empty($fontSize)){ $fontSize = '70px'; } @endphp
    <a href="{{ route('topics') }}" class="btn btn-fab btn-fab-mini">
        <i class="material-icons" style="font-size: {{$fontSize}}">arrow_back</i>
    </a>
--}}
<div class="route-nav-btn">
    <a href="{{ route('topics') }}" class="btn btn-fab btn-fab-mini">
        <i class="material-icons">arrow_back</i>
    </a>
    <a href="{{ route('editTopic', $topic->title_slug) }}" class="btn btn-fab btn-fab-mini">
        <i class="material-icons">edit</i>
    </a>
    <a href="{{ route('topics') }}" class="btn btn-fab btn-fab-mini">
        <i class="material-icons">close</i>
    </a>
</div>
