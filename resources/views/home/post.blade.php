<article class="post">
    <div class="post__header">
        <div class="user__info">
            <div class="user__img">
                <img src={{asset('images/instagram__test.jpg')}} alt="">
            </div>
            <div class="user__details">
                <strong>{{$post->user->profile->username}}</strong>
                <small>{{$post->user->profile->bio}}</small>
            </div>
        </div>
        <div class="action__button">
            <strong>.</strong>
            <strong>.</strong>
            <strong>.</strong>
        </div>
    </div>
    <div class="post__content">
        <div class="content__img">
            <img src={{asset(Storage::url($post->image))}} alt="">
        </div>
    </div>
    <div class="post__footer">
        <div class="post__actions" data-id="{{$post->id}}" data-="">
            <span class="like">
                @if (Auth::user()->likes()->where('post_id', $post->id)->first())
                    <svg aria-label="Unlike" class="_8-yf5 " fill="#ed4956" height="24" viewBox="0 0 48 48" width="24"><path d="M34.6 3.1c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5s1.1-.2 1.6-.5c1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path></svg>
                @else
                    <svg aria-label="Like" class="_8-yf5 " fill="#262626" height="24" viewBox="0 0 48 48" width="24"><path d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path></svg>
                @endif
                <strong>{{$post->likes()->where('post_id', $post->id)->count()}}</strong>
            </span>
            <span onclick="$('textarea.data_id_{{$post->id}}').focus()">
                <svg aria-label="Comment" class="_8-yf5 " fill="#262626" height="24" viewBox="0 0 48 48" width="24"><path clip-rule="evenodd" d="M47.5 46.1l-2.8-11c1.8-3.3 2.8-7.1 2.8-11.1C47.5 11 37 .5 24 .5S.5 11 .5 24 11 47.5 24 47.5c4 0 7.8-1 11.1-2.8l11 2.8c.8.2 1.6-.6 1.4-1.4zm-3-22.1c0 4-1 7-2.6 10-.2.4-.3.9-.2 1.4l2.1 8.4-8.3-2.1c-.5-.1-1-.1-1.4.2-1.8 1-5.2 2.6-10 2.6-11.4 0-20.6-9.2-20.6-20.5S12.7 3.5 24 3.5 44.5 12.7 44.5 24z" fill-rule="evenodd"></path></svg>
            </span>
            <span>
                <svg aria-label="Direct" class="_8-yf5 " fill="#262626" height="22" viewBox="0 0 48 48" width="22"><path d="M47.8 3.8c-.3-.5-.8-.8-1.3-.8h-45C.9 3.1.3 3.5.1 4S0 5.2.4 5.7l15.9 15.6 5.5 22.6c.1.6.6 1 1.2 1.1h.2c.5 0 1-.3 1.3-.7l23.2-39c.4-.4.4-1 .1-1.5zM5.2 6.1h35.5L18 18.7 5.2 6.1zm18.7 33.6l-4.4-18.4L42.4 8.6 23.9 39.7z"></path></svg>
            </span>
            <span>
                <svg aria-label="Save" class="_8-yf5 " fill="#262626" height="24" viewBox="0 0 48 48" width="24"><path d="M43.5 48c-.4 0-.8-.2-1.1-.4L24 29 5.6 47.6c-.4.4-1.1.6-1.6.3-.6-.2-1-.8-1-1.4v-45C3 .7 3.7 0 4.5 0h39c.8 0 1.5.7 1.5 1.5v45c0 .6-.4 1.2-.9 1.4-.2.1-.4.1-.6.1zM24 26c.8 0 1.6.3 2.2.9l15.8 16V3H6v39.9l15.8-16c.6-.6 1.4-.9 2.2-.9z"></path></svg>
            </span>
        </div>
        <div class="caption id_{{$post->id}}">
            <div class="likedBy">
                @if ($post->likes()->where('post_id', $post->id)->first())
                Liked by <strong>{{$post->likes()->where('post_id', $post->id)->first()->profile->username}}</strong>&nbsp;and <strong>others</strong>
                @endif
            </div>
            <div class="description">
                <strong>{{$post->user->profile->username}}</strong>&nbsp;
                {{$post->caption}}
            </div>
            @if ($post->comments()->where('post_id', $post->id)->count())
                <span class="showAllComments">show all comments</span>
                <div class="comments id_{{$post->id}}">
                    @foreach ($post->comment()->where('post_id', $post->id)->limit(3)->latest()->get() as $comment)
                        <div class="comment"><strong>{{$comment->user->profile->username}}</strong>&nbsp;{{$comment->comment}}</div>
                    @endforeach
                </div>
            @endif
            <small class="createdAt">
                3 HOURS AGO
            </small>
        </div>
        <div class="createComment">
            <form action="{{route('addComment')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <textarea name="comment" class="data_id_{{$post->id}}" aria-label="Add a comment…" placeholder="Add a comment…" autocomplete="off" autocorrect="off"></textarea>
                <button type="submit" class="commentBtn">post</button>
            </form>
        </div>
    </div>
</article>

@section('script')
    <script>
        const like = (e) =>{
            let postId = $(e.currentTarget).parent().data('id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:"{{ route('like') }}",
                data: {'id': postId},
                success:function(data){
                    let likeBtn = $(e.currentTarget).children('svg');
                    let countElement = $(e.currentTarget).children('strong');
                    if (likeBtn.attr('aria-label') == 'Like') {
                        likeBtn.replaceWith('<svg aria-label="Unlike" class="_8-yf5 " fill="#ed4956" height="24" viewBox="0 0 48 48" width="24"><path d="M34.6 3.1c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5s1.1-.2 1.6-.5c1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path></svg>');
                        countElement.html(parseFloat(countElement.html()) + 1)
                    } else {
                        likeBtn.replaceWith('<svg aria-label="Like" class="_8-yf5 " fill="#262626" height="24" viewBox="0 0 48 48" width="24"><path d="M34.6 6.1c5.7 0 10.4 5.2 10.4 11.5 0 6.8-5.9 11-11.5 16S25 41.3 24 41.9c-1.1-.7-4.7-4-9.5-8.3-5.7-5-11.5-9.2-11.5-16C3 11.3 7.7 6.1 13.4 6.1c4.2 0 6.5 2 8.1 4.3 1.9 2.6 2.2 3.9 2.5 3.9.3 0 .6-1.3 2.5-3.9 1.6-2.3 3.9-4.3 8.1-4.3m0-3c-4.5 0-7.9 1.8-10.6 5.6-2.7-3.7-6.1-5.5-10.6-5.5C6 3.1 0 9.6 0 17.6c0 7.3 5.4 12 10.6 16.5.6.5 1.3 1.1 1.9 1.7l2.3 2c4.4 3.9 6.6 5.9 7.6 6.5.5.3 1.1.5 1.6.5.6 0 1.1-.2 1.6-.5 1-.6 2.8-2.2 7.8-6.8l2-1.8c.7-.6 1.3-1.2 2-1.7C42.7 29.6 48 25 48 17.6c0-8-6-14.5-13.4-14.5z"></path></svg>');
                        countElement.html(parseFloat(countElement.html()) - 1)
                    }
                    // 
                }
            });
        }
        $('.post__actions .like').on('click' , (e) => like(e));
        // $('.content__img').on('dblclick' , () => $('.post__actions .like').click());
        // comment
        $('.commentBtn').on('click', (e) => {
            e.preventDefault();
            let form = $(e.currentTarget).parent();
            let commentInput = form.children('textarea');
            if (commentInput.val() !== "" || commentInput.val() !== null) {
                let formData = new FormData(form[0]);
                $(e.currentTarget).attr("disabled", true);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    type:'POST',
                    url:"{{ route('addComment') }}",
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success:function(data){
                        let commentsArea = $(`.comments.id_${data.post_id}`);
                        commentInput.val("")
                        if (commentsArea.length == 0) {
                            $(`
                            <span class="showAllComments">show all comments</span>
                            <div class="comments id_${data.post_id}">
                                    <div class="comment"><strong>${data.user}</strong>&nbsp;${data.comment}</div>
                            </div>
                            `).insertBefore(`.caption.id_${data.post_id} .createdAt`)
                        }
                        if (commentsArea.children().length >= 3) {
                            commentsArea.children().last().remove();
                        }
                        commentsArea.prepend(`
                            <div class="comment"><strong>${data.user}</strong>&nbsp;${data.comment}</div>
                        `)
                        $(e.currentTarget).attr("disabled", false);
                    }
                });
            }
        })
    </script>
@endsection