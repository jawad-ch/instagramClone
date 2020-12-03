@extends('layouts.app')

@section('content')
    <div class="home">
        <div class="">
            <div class="post__container">
                @include('home.post', ['post'=>$post])
            </div>
        </div>
    </div>
@endsection
