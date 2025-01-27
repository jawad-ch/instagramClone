<div class="modal__container">
    <header class="modal__header">
        <div class="closeModal"></div>
        <h1 class="title">{{$title}}</h1>
        <div class="closeModal">
            <svg aria-label="Close" class="_8-yf5 " fill="#262626" height="24" viewBox="0 0 48 48" width="24"><path clip-rule="evenodd" d="M41.1 9.1l-15 15L41 39c.6.6.6 1.5 0 2.1s-1.5.6-2.1 0L24 26.1l-14.9 15c-.6.6-1.5.6-2.1 0-.6-.6-.6-1.5 0-2.1l14.9-15-15-15c-.6-.6-.6-1.5 0-2.1s1.5-.6 2.1 0l15 15 15-15c.6-.6 1.5-.6 2.1 0 .6.6.6 1.6 0 2.2z" fill-rule="evenodd"></path></svg>
        </div>
    </header>
    <div class="modal__body">
        <ul>
            @foreach ($follows as $follow)
                <li class="user">
                    <div class="userInfo">
                        <div class="user_img"><img src={{ asset($follow->profile->profileImage())}} alt=""></div>
                        <div class="user_name">
                            <strong>{{$follow->profile->username}}</strong>
                            <small>{{$follow->name}}</small>
                        </div>
                    </div>
                    <div class="followBtn">
                        <button>follow</button>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>