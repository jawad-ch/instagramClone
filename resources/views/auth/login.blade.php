@extends('layouts.app')

@section('content')
    <div class="login__container">
        <div class="login__card">
            <div class="login__header"><img src={{ asset('images/instagram_logo.png')}} alt=""></div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form__group">
                    <label for="email">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email" class="@error('email') is__invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="@gmail.com">

                    @error('email')
                        <span class="invalid__feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form__group">
                    <label for="password">{{ __('Password') }}</label>
                    <input id="password" type="password" class="@error('password') is__invalid @enderror" name="password" required autocomplete="current-password" placeholder="+++++++">

                    @error('password')
                        <span class="invalid__feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form__group">
                    <button type="submit" class="btn__primary">
                        {{ __('Login') }}
                    </button>
                    @if (Route::has('password.request'))
                        <a class="btn__link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
        <div class="login__card">
            <span>Don't have an account ?<a href={{route('register')}}>Sign up</a></span>
        </div>
    </div>
@endsection
