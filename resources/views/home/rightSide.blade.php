<div class="rightSide__container">
    <div class="rightSide__userInfo">
        <div class="rightSide__userDetails">
            <img src={{ asset($authUser->profile->profileImage())}} alt="">
            <div class="userName">
                <strong>{{$authUser->name}}</strong>
                <small>{{$authUser->profile->username}}</small>
            </div>
        </div>
        <div class="rightSide__switchBtn">
            switch
        </div>
    </div>
    <div class="rightSide__suggestions">
        <div class="suggestions__header">
            <span>Suggestions For You</span>
            <a href="#">See All</a>
        </div>
        <div class="suggestions__body">
            @if ($sugestedUsers->count() > 2)
                @foreach ($sugestedUsers as $sugestedUser)
                    <div class="suggestions__user">
                        <a href="#" class="suggestions__userImg"><img src={{asset($sugestedUser->profile->profileImage())}} alt=""></a>
                        <div class="suggestions__userName">
                            <strong>{{$sugestedUser->profile->username}}</strong>
                            <small>{{$sugestedUser->name}}</small>
                        </div>
                        <div class="suggestions__followBtn">
                            @include('profile.followBtn', ['user'=>$sugestedUser])
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

@section('script')
    <script src="{{asset("js/follow.js")}}"></script>
@endsection