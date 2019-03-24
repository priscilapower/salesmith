@extends('layouts.app')

@section('content')
@push('styles')
<style>
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}
.button4 {
    background-color: #e7e7e7;
    color: black;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}


input[type=text] {
    border:1px solid grey;
    background-color: lightgray;
}
</style>
@endpush
<div class="container">
    <div class="row justify-content-center" style="margin: auto; width: 50%; padding: 10px;">
        <div class="col-md-8">
            <div class="card" style="border:3px solid grey;">
                <div class="card-header" style="background-color:darkgray; padding: 10px 10px;">{{ __('Login') }}</div>

                <div class="card-body" style="padding-top: 10px">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" style="margin: 0px 20px">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6" style="margin: 0px 20px">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus style="width: 100%">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right" style="margin: 0px 20px">{{ __('Password') }}</label>

                            <div class="col-md-6" style="margin: 0px 20px">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required style="width: 100%">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<br>
                        <div class="form-group row" style="margin: 0px 20px">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0" style="margin: 10px 20px; padding-bottom:10px">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary button">
                                    {{ __('Login') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link button4 " href="{{ route('password.request') }}">
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
@endsection
