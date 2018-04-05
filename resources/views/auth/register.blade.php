@extends('layouts.app')

@section('title')
    Create Account
@endsection

@section('register')
<div class="modal-dialog modal-md">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">{{ __('Create Account') }}</h4>
        </div>
        <div class="modal-body">
            <div class="widget clearfix">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <form class="sidebar-login" action="{{route('register')}}" method="POST">
                            @csrf

                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                   placeholder="{{ __('Name') }}" required autofocus
                                   class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}">

                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif

                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                   placeholder="{{ __('Email Address') }}" required
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}">

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif

                            <input type="password" id="password" name="password" placeholder="Password" required
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif

                            <input type="password" id="password-confirm" name="password_confirmation"
                                   class="form-control" required>

                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="captcha"> &emsp; {{ __('I am not a Robot') }}
                                </label>
                            </div>

                            <button type="submit" class="btn btn-raised btn-info gr">
                                {{ __('Register') }}
                            </button>

                            <span class="pull-right" style="margin-top: 12px;">
                                Already have an account? &nbsp;<a href="{{ route('login') }}">Sign in</a>
                            </span>
                        </form>
                    </div>
                </div>
            </div><!-- end widget -->
        </div>
    </div>
</div>
@endsection
