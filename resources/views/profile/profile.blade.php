@extends('layouts.app')

@section('content')
<div class="profile__container">
    <header class="profile__header">
        <div class="profile__img">
            <img src={{ asset($user->profile->profileImage())}} alt="">
        </div>
        <div class="profile__info">
            <div class="top">
                <h1>{{$user->profile->username}}</h1>
                @if ($user->id !== Auth::user()->id)
                    <div class="editBtn">
                        @include('profile.followBtn', ['user'=>$user])
                    </div>
                @endif
                @if ($user->id === Auth::user()->id)
                    <div class="editBtn addPost">
                        <a href={{route('addpost', 'jawad')}}>Add post</a>
                    </div>
                    <div class="editBtn">
                        <a href={{route('editProfile', $user->name)}}>Edit Profile</a>
                    </div>
                @endif
                <a href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="settingBtn">
                    <img width="30" height="30" src={{asset('images/logout.jpg')}} alt="">    
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>
                    @csrf
                </form>
            </div>
            <div class="middle">
                <ul>
                    <li><span><strong>{{$posts->count()}}</strong>@if ($posts->count() > 1) posts @else post @endif</span></li>
                    <li><span class="followers"><strong>{{$user->followers->count()}}</strong>@if ($user->followers->count() > 1) followers @else follower @endif</span></li>
                    <li><span class="followings"><strong>{{$user->following->count()}}</strong>@if ($user->following->count() > 1) followings @else followings @endif</span></li>
                </ul>
            </div>
            <div class="bottom">
                <h1>{{$user->name}}</h1>
            </div>
        </div>
    </header>
    <div class="profile__posts">
        @foreach ($posts as $post)
            <a href={{route('singlePost', $post->id)}} class="post">
                <img src={{ Storage::url($post->image) }} alt="">
                <div class="post__details">
                    <span class="likes"><i><svg aria-label="likes" fill="#fff" height="24" viewBox="0 0 48 48" width="24"><path d="M34.6 3.1c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5s1.1-.2 1.6-.5c1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path></svg></i>{{$post->likes()->where('post_id', $post->id)->count()}}</span>
                    <span class="comments"><i><svg aria-label="Comment" fill="#fff" height="24" viewBox="0 0 48 48" width="24"><path clip-rule="evenodd" d="M47.5 46.1l-2.8-11c1.8-3.3 2.8-7.1 2.8-11.1C47.5 11 37 .5 24 .5S.5 11 .5 24 11 47.5 24 47.5c4 0 7.8-1 11.1-2.8l11 2.8c.8.2 1.6-.6 1.4-1.4zm-3-22.1c0 4-1 7-2.6 10-.2.4-.3.9-.2 1.4l2.1 8.4-8.3-2.1c-.5-.1-1-.1-1.4.2-1.8 1-5.2 2.6-10 2.6-11.4 0-20.6-9.2-20.6-20.5S12.7 3.5 24 3.5 44.5 12.7 44.5 24z"></path></svg></i>{{$post->comments()->where('post_id', $post->id)->count()}}</span>
                </div>
            </a>
        @endforeach
    </div>
</div>
<div class="modal followings">
    @include('profile.followsModal', ['follows'=>$user->following()->get(), 'title'=>'followings'])
</div>
<div class="modal followers">
    @include('profile.followsModal', ['follows'=>$user->followers()->get(), 'title'=>'followers'])
</div>
@endsection
@section('script')
    <script>
        const openModal = (e) =>{
            if (e === "followers") {
                document.querySelector('.modal.followings').classList.add('open')
            }else{
                document.querySelector('.modal.followers').classList.add('open')
            }
        }
        document.querySelector('.followings').addEventListener('click', () => openModal("followers"))
        document.querySelector('.followers').addEventListener('click', () => openModal("followings"))
        document.querySelectorAll('.closeModal svg').forEach(e => {
            e.closest('.closeModal').addEventListener('click', () => {e.closest('.modal.open').classList.remove('open')})
        });
    </script>
@endsection

{{-- {{dd($user->following()->get())}} --}}