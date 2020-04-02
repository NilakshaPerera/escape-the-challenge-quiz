@extends('layouts.app')
@section('content')

<div class="container">
    <div id="" name="" class="auth-box d-flex justify-content-center align-items-center">
        <div class="box">
            <div class="text-center">
        <img  src="./../uploads/new_logo/Logo-ACCA.png" alt="Trulli" width="400" height=auto>
            </div>
            <h1 class="text-center h0 mb-4">{!! __('Welcome to the <br>ACCA Escape The Challenge') !!}</h1>
            <h2 class="text-center mb-4">{{ __('Please enter the login details.') }}</h2>
            <form method="POST" action="{{ route('login') }}" class="form-element">
                @csrf
                <div class="form-group text-center mb-4">
                    <input placeholder="Username" id="email" type="email" class="round-input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group mb-4">
                    <input placeholder="Password" id="password" type="password" class="round-input form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-actions">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary red-button round-button">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
