<div class="follow" data-id="{{$user->id}}">
    @if (Auth::user()->isFollowing($user))
        <span aria-label="unfollow">unfollow</span>
        @else
        <span aria-label="follow">follow</span>
    @endif
</div>
@section('script')
    <script src="{{asset("js/follow.js")}}"></script>
@endsection