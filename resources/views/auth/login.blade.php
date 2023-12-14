@extends('layouts.app2')

@section('content')

    <body id="bgcolor">


        <div class="container" style="margin-top:50px;" id="weight">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card" id="shadow">
                        <div class="card-header" id="card">{{ __('ล็อคอิน') }}</div>

                        <div class="card-body" id="bgcard">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger alert-block">
                                        <button type="button" class="close" data-dismiss="alert">x</button>
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @endif

                                <div class="row mb-3" style="margin-top:40px">
                                    <label for="email" style="margin-top:5px" class="col-md-3 col-form-label text-md-end"
                                        id="emailPass">{{ __('อีเมล') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" placeholder="อีเมล"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email"
                                            style="height: 60px; width: 400px;" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3" style="margin-top:30px">
                                    <label for="password" style="margin-top:5px" class="col-md-3 col-form-label text-md-end"
                                        id="emailPass">{{ __('รหัสผ่าน') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" placeholder="รหัสผ่าน" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password"
                                            style="    height: 60px;
    width: 400px;">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3" style="margin-right:100px; margin-top:10px;">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                                {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-0" style="margin-right:140px;margin-top:25px">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" id="btnLogin">
                                            {{ __('Login') }}
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}"
                                                style="margin-left:60px">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </body>
@endsection
