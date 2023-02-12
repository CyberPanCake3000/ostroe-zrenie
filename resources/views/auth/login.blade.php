<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Острое Зрение</title>
    @vite(['resources/js/app.js'])
</head>
<body class="bg-body d-flex vh-100 justify-content-center align-items-center">

<form class="bg-white align-self-center p-5 rounded-5" action="{{ route('login') }}">
    @csrf
    <div class="d-flex justify-content-center pb-4">
        <img src="/attachments/brand/logo.png" alt="" width="100px">
    </div>

{{--    <div class="input-group mb-3">--}}
{{--        <span class="input-group-text border-end-0 bg-white" id="username-input">@</span>--}}
{{--        <input type="text" class="form-control border-start-0 bg-white" placeholder="Имя пользователя" aria-label="Username" aria-describedby="username-input">--}}
{{--    </div>--}}

    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

{{--    <div class="input-group mb-3">--}}
{{--        <span class="input-group-text border-end-0 bg-white" id="password-input">p</span>--}}
{{--        <input type="password" class="form-control border-start-0 bg-white" placeholder="Пароль" aria-label="Password" aria-describedby="password-input">--}}
{{--        <button class="btn bg-white border border-start-0" type="button">e</button>--}}
{{--    </div>--}}

    <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="remember-user">
        <label class="form-check-label" for="remember-user">Запомнить меня на этом устройстве</label>
    </div>

    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-lg btn-primary text-white align-self-center">Войти</button>
    </div>
</form>
</body>
</html>
