@extends('layouts.app')

@section('content')
<div class="home">
    <div class="home__container">
        <section class="post__container">
            @if ($posts->count())
                @foreach ($posts as $post)
                    @include('home.post', ['post'=>$post])
                @endforeach
            @endif
        </section>
        @include('home.rightSide', ['authUser'=>$user,'sugestedUsers'=>$sugestedUsers])
    </div>
</div>
@endsection
