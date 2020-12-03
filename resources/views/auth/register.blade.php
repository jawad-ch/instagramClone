@extends('layouts.app')

@section('content')
    <div class="login__container">
        <div class="login__card">
            <div class="login__header"><img src={{ asset('images/instagram_logo.png')}} alt=""></div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                @method('POST')
                <div class="form__group">
                    <label for="username">{{ __('username') }}</label>
                    <input id="username" type="text" class="@error('username') is__invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="username">

                    @error('username')
                        <span class="invalid__feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
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
                    <label for="password">{{ __('Confirm Password') }}</label>
                    <input id="password" type="password" name="password_confirmation" required autocomplete="current-password" placeholder="+++++++">
                </div>
                <div class="form__group">
                    <button type="submit" class="btn__primary">
                        {{ __('register') }}
                    </button>
                </div>
            </form>
        </div>
        <div class="login__card">
            <span>Already have account ?<a href={{route('login')}}>Login</a></span>
        </div>
    </div>
@endsection