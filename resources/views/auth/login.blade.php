@extends('layouts.app')

@section('title')
    Sign in
@endsection

@section('login')
    <div id="LoginModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-md">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ __('Login') }}</h4>
                </div>
                <div class="modal-body">
                    <div class="widget clearfix">
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                {{--<form class="sidebar-login" action="{{route('signin')}}" method="post">--}}
                                <form class="sidebar-login" action="{{route('login')}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                                           placeholder="{{ __('Email Address') }}" required autofocus
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

                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                            &emsp; {{ __('Remember Me') }}
                                        </label>
                                    </div>

                                    <button type="submit" class="btn btn-raised btn-info gr">
                                        {{ __('Login') }}
                                    </button>

                                    &emsp;
                                    <a href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>

                                    <span class="pull-right" style="margin-top: 12px;">
                                        No account yet? &nbsp;<a href="{{ route('register') }}">Register</a>
                                    </span>
                                </form>
                            </div>
                        </div>
                    </div><!-- end widget -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    @if( Route::is('login') )
        <script type="text/javascript">
            $(document).ready(function () {
                $('#login').click();
            });
        </script>
    @endif
@endpush

