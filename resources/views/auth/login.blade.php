@extends('layouts.app')

@section('content')
    <!-- Section Breadcrumbs-->
{{--    <section class="section parallax-container breadcrumbs-wrap" data-parallax-img="images/background.png">--}}
{{--        <div class="parallax-content breadcrumbs-custom context-dark">--}}
{{--            <div class="container">--}}
{{--                <h3 class="breadcrumbs-custom-title">Login</h3>--}}
{{--                <ul class="breadcrumbs-custom-path">--}}
{{--                    <li><a href="index.html">Home</a></li>--}}
{{--                    <li><a href="#">Login</a></li>--}}

{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- Section Login/register-->
    <section class="section section-variant-1 bg-gray-100">
        <div class="container">
            <div class="row row-50 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-6">
                    <div class="card-login-register" id="card-l-r">
                        <div class="card-top-panel">
                            <div class="card-top-panel-left">
                                <h5 class="card-title card-title-login">Login</h5>
                            </div>
                        </div>
                        <div class="card-form card-form-login">
                            <form  method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-wrap">
                                    <input name="email" class="form-input @error('email') is-invalid @enderror" id="email" placeholder="Email" type="email"  value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-wrap">
                                    <input class="form-input @error('password') is-invalid @enderror" id="password" type="password" placeholder="Password" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <label class="checkbox-inline checkbox-inline-lg checkbox-light">
                                    <input   type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>Remember Me
                                </label>
                                <button class="button button-lg button-primary button-block" type="submit">Sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

{{--@extends('layouts.appDefault')--}}

{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">{{ __('Login') }}</div>--}}

{{--                    <div class="card-body">--}}
{{--                        <form method="POST" action="{{ route('login') }}">--}}
{{--                            @csrf--}}

{{--                            <div class="row mb-3">--}}
{{--                                <label for="email"--}}
{{--                                       class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="email" type="email"--}}
{{--                                           class="form-control @error('email') is-invalid @enderror" name="email"--}}
{{--                                           value="{{ old('email') }}" required autocomplete="email" autofocus>--}}

{{--                                    @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row mb-3">--}}
{{--                                <label for="password"--}}
{{--                                       class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="password" type="password"--}}
{{--                                           class="form-control @error('password') is-invalid @enderror" name="password"--}}
{{--                                           required autocomplete="current-password">--}}

{{--                                    @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row mb-3">--}}
{{--                                <div class="col-md-6 offset-md-4">--}}
{{--                                    <div class="form-check">--}}
{{--                                        <input class="form-check-input" type="checkbox" name="remember"--}}
{{--                                               id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

{{--                                        <label class="form-check-label" for="remember">--}}
{{--                                            {{ __('Remember Me') }}--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="row mb-0">--}}
{{--                                <div class="col-md-8 offset-md-4">--}}
{{--                                    <button type="submit" class="btn btn-primary">--}}
{{--                                        {{ __('Login') }}--}}
{{--                                    </button>--}}

{{--                                    @if (Route::has('password.request'))--}}
{{--                                        <a class="btn btn-link" href="{{ route('password.request') }}">--}}
{{--                                            {{ __('Forgot Your Password?') }}--}}
{{--                                        </a>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
