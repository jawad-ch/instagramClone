@extends('layouts.app')
@section('content')
    <div class="create__container editProfile">
        <header>
            <span>edit profile info</span>
            @if (session('messageii'))
                <span class="flashMessage">
                    <div>
                        {{ session('messageii') }}
                    </div>
                    <i class="closeFlashMsg">&times;</i>
                </span>
            @endif
        </header>
        <form action="{{ route('updateProfile', Auth::user()->name) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form__group">
                <div class="profileImgWrapper">
                    <img class="editProfileImg" src={{ asset($profileuser->profile->profileImage())}} alt="{{$profileuser->name}}"/>
                    <label for="profileImg">{{ __('click to change image') }}</label>
                    <input id="profileImg" hidden type="file" class="profileImgInput @error('profileImg') is__invalid @enderror" name="profileImg">
                </div>
                @error('profileImg')
                    <span class="invalid__feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form__group">
                <label for="name">{{ __('your name') }}</label>
                <input id="name" type="text" class="@error('name') is__invalid @enderror" name="name" value={{$profileuser->name}}>

                @error('name')
                    <span class="invalid__feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form__group">
                <label for="username">{{ __('username') }}</label>
                <input id="username" type="text" class="@error('username') is__invalid @enderror" name="username" value={{$profileuser->profile->username}}>

                @error('username')
                    <span class="invalid__feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form__group">
                <label for="bio">{{ __('bio') }}</label>
                <input id="bio" type="text" value="{{ $profileuser->profile->bio ?? "add a bio to your profile" }}" class="@error('bio') is__invalid @enderror" name="bio">

                @error('bio')
                    <span class="invalid__feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form__group">
                <button type="submit" class="btn__primary">
                    {{ __('save') }}
                </button>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        let closeFlashMsg = document.querySelector('.closeFlashMsg');
        let preview = document.querySelector('.editProfileImg');
        let file    = document.querySelector('.profileImgInput');
        let reader  = new FileReader();
        const previewFile = () =>{
            reader.onloadend = function () {
                preview.src = reader.result;
            }

            if (file.files[0]) {
                reader.readAsDataURL(file.files[0]);
            } else {
                preview.src = preview.src;
            }
        }
        file.addEventListener('change', () => previewFile());
        closeFlashMsg.addEventListener('click', () => closeFlashMsg.closest('span').remove());
    </script>
@endsection