@extends('layouts.app')

@section('content')
    <div class="create__container">
    <form action="{{ route('p.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="form__group">
                <label>{{ __('choose an image') }}</label>
                <div class="addImageWraper">
                    <label for="image">
                        <svg id="Capa_1" enable-background="new 0 0 512 512" height="60" viewBox="0 0 512 512" width="60" xmlns="http://www.w3.org/2000/svg"><g><path d="m424.754 277.841c0-20.681 0-171.182 0-191.894v-.001c0-25.195-20.496-45.703-45.703-45.703-351.7.332-334.082-.806-342.546.93-20.807 4.269-36.505 22.722-36.505 44.773v.001 37.827 215.098c0 25.201 20.503 45.703 45.704 45.703h272.316c5.022 48.942 46.489 87.246 96.734 87.246 53.622 0 97.246-43.624 97.246-97.246 0-50.245-38.304-91.712-87.246-96.734zm-41.794-217.301c12.324 1.889 21.794 12.563 21.794 25.407v27.827h-384.754v-27.827c0-12.844 9.47-23.519 21.795-25.407 3.241-.497 338.519-.406 341.165 0zm-362.96 278.332v-20.763l38.642-30.597c4.329-3.429 5.061-9.718 1.632-14.048-3.428-4.328-9.718-5.061-14.048-1.632l-26.226 20.767v-158.825h384.754v110.901l-12.134-7.728c-13.771-8.77-31.241-8.288-44.509 1.224l-45.195 32.407c-9.97 7.149-23.545 6.695-33.016-1.102l-70.869-58.349c-21.627-17.806-53.268-18.107-75.233-.717l-17.268 13.674c-4.33 3.429-5.061 9.718-1.632 14.048 3.429 4.329 9.716 5.06 14.048 1.632l17.268-13.674c14.627-11.583 35.702-11.381 50.105.478l70.868 58.348c16.46 13.551 40.056 14.338 57.383 1.916l45.195-32.407c6.591-4.727 15.271-4.964 22.111-.608l22.877 14.57v9.447c-46.521 4.728-82.197 41.849-86.736 86.741h-272.313c-14.173 0-25.704-11.53-25.704-25.703zm394.754 112.949c-42.593 0-77.245-34.652-77.245-77.246 0-42.089 34.137-77.245 77.245-77.245 42.594 0 77.246 34.652 77.246 77.245 0 42.594-34.652 77.246-77.246 77.246z"/><path d="m442.943 368.193h-18.943v-18.943c0-5.522-4.478-10-10-10s-10 4.478-10 10v18.943h-18.943c-5.522 0-10 4.478-10 10s4.478 10 10 10h18.943v18.943c0 5.522 4.478 10 10 10s10-4.478 10-10v-18.943h18.943c5.522 0 10-4.478 10-10s-4.477-10-10-10z"/><path d="m337 97.009h31c5.522 0 10-4.478 10-10s-4.478-10-10-10h-31c-5.522 0-10 4.478-10 10s4.478 10 10 10z"/><path d="m82.315 246.032h-.024c-5.522 0-9.987 4.478-9.987 10s4.489 10 10.012 10 10-4.478 10-10-4.478-10-10.001-10z"/><path d="m296.359 234.398c22.689 0 41.149-18.459 41.149-41.148s-18.46-41.149-41.149-41.149-41.149 18.46-41.149 41.149 18.46 41.148 41.149 41.148zm0-62.297c11.662 0 21.149 9.487 21.149 21.149 0 11.661-9.487 21.148-21.149 21.148s-21.149-9.487-21.149-21.148c0-11.662 9.487-21.149 21.149-21.149z"/></g></svg>
                    </label>
                    <input id="image" hidden type="file" class="@error('image') is__invalid @enderror" name="image" required>
                    <span class="resetIinputBtn">cancle image</span>
                </div>
                <div class="addImagePreview">
                    <img src="" alt="">
                </div>
                @error('image')
                    <span class="invalid__feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form__group">
                <label for="caption">{{ __('Password') }}</label>
                <textarea name="caption" class="@error('caption') is__invalid @enderror" required placeholder="add a caption" id="caption" cols="30" rows="6"></textarea>
                @error('caption')
                    <span class="invalid__feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form__group">
                <button type="submit" class="btn__primary">
                    {{ __('post') }}
                </button>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script>
        let preview = document.querySelector('.addImagePreview img');
        let file    = document.querySelector('.addImageWraper input');
        let resetIinputBtn    = document.querySelector('.resetIinputBtn');
        let reader  = new FileReader();
        const previewFile = () =>{
            reader.onloadend = function () {
                preview.src = reader.result;
                preview.parentElement.style.display = 'block'
                resetIinputBtn.style.display = 'block'
            }

            if (file.files[0]) {
                reader.readAsDataURL(file.files[0]);
            } else {
                preview.src = preview.src;
            }
        }
        const resetFile = () => {
            preview.parentElement.style.display = 'none'
            resetIinputBtn.style.display = 'none'
            file.value = "";
        }
        file.addEventListener('change', () => previewFile());
        resetIinputBtn.addEventListener('click', () => resetFile());
    </script>
@endsection