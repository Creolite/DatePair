@php
    $post = isset($topic) ? $topic : (isset($comment) ? $comment : []);
@endphp
<a href="{{ route('user.show', ['user' => $post->user_id]) }}" style="text-decoration: none;">
    @if(empty($props) or in_array('image', $props))
        <img src="{{url('assets/images/uploads/team_02.jpg')}}" alt="" class="avatar img-circle img-responsive">
    @endif

    @if(empty($props) or in_array('name', $props))
        <div class="text-center mt-5">
            <h4>{{ $post->user->name }}</h4>
        </div>
    @endif
</a>