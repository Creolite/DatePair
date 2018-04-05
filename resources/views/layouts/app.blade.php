<!DOCTYPE html>
<!--[if IE 9]>--> <!--<html class="no-js ie9 fixed-layout" lang="en">--> <!--<![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js " lang="{{ app()->getLocale() }}"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | @yield('title')</title>
    <!-- Site Metas -->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="{{url('assets/images/favicon.ico')}}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{url('assets/images/apple-touch-icon.png')}}">

    <!-- Material Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet">
    {{--<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">--}}
    <link rel="stylesheet" href="{{url('assets/fonts/material-icons/font-material-icons.css')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/bootstrap-material-design.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/ripples.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/font-awesome.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{url('assets/style.css')}}">
    <!-- Colors CSS -->
    <link rel="stylesheet" href="{{url('assets/css/colors.css')}}">

    {{-- FOR DEPLOYMENT --}}
    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}

    <!-- Styles -->
    {{--<link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    {{-- Check these out first before deploy --}}
    <!--[if lt IE 9]>-->
    <!--<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>-->
    {{--<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>--}}
    <!--[endif]-->
</head>
<body>
    <div id="app">
        <main class="py-4">
            <div id="wrapper">
                <header class="header">
                    <div class="container-fluid">
                        <nav class="navbar navbar-default">
                            <div class="container">
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand" href="{{url('/')}}">
                                        <i class="material-icons">book</i> {{ config('app.name', 'Laravel') }}
                                    </a>
                                </div>
                                <div class="navbar-collapse collapse navbar-responsive-collapse">
                                    <ul class="nav navbar-nav">
                                        <li class="active"><a href="{{url('/')}}">Home</a></li>
                                        <li class="dropdown hasmenu">
                                            <a href="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="faqs.html">FAQS</a></li>
                                                <li><a href="single-topic.html">Single Topic</a></li>
                                                <li><a href="single-knowlegde-base.html">Single Knowledge</a></li>
                                                <li><a href="single-forum.html">Single Forum</a></li>
                                                <li><a href="login.html">Login Page</a></li>
                                                <li><a href="contact.html">Contact Page</a></li>
                                                <li><a href="404.html">404 Page</a></li>
                                            </ul>
                                        </li>
                                        <!-- <li><a href="knowledge-base.html">Knowledge Base</a></li>
                                        <li><a href="topics.html">Topics</a></li>
                                        <li><a href="forums.html">Forums</a></li>
                                        <li><a href="documentation.html">Documentation</a></li> -->
                                    </ul>
                                    <ul class="nav navbar-nav navbar-right">
                                        @guest
                                            <li><a href="{{ route('register') }}">Register </a></li>
                                            @if( Route::is('login') )
                                                <li><a id="login" href="" data-toggle="modal" data-target="#LoginModal">
                                                        <i class="material-icons">lock</i> Login
                                                </a></li>
                                            @else
                                                <li><a href="{{ route('login') }}">Login </a></li>
                                            @endif
                                        @else
                                            {{--<li><a href="{{route('new_topic')}}">New Topic</a></li>--}}
                                            {{--<li><a href="{{route('logout')}}"><i class="material-icons">lock</i>Logout</a></li>--}}
                                            <li><a href="{{route('home')}}">New Topic</a></li>
                                            {{--                                <li><a href="{{route('logout')}}"><i class="material-icons">lock</i>Logout</a></li>--}}
                                            <li class="dropdown hasmenu">
                                                {{--<a href="#" data-target="#">Categories <b class="caret"></b></a>--}}
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    {{ Auth::user()->name }} <span class="caret"></span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                        </a>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                </ul>
                                            </li>
                                        @endguest
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div><!-- end container -->
                </header><!-- end header -->

            @yield('home')

            @guest
                @if( Route::is('register') )
                    @yield('register')
                @endif

                @yield('login')

            @endguest

            @include('layouts.footer')

            </div>
        </main>
    </div>
</body>
<script src="{{url('assets/js/jquery.js')}}"></script>
<script src="{{url('assets/js/bootstrap.js')}}"></script>
<script src="{{url('assets/js/ripples.min.js')}}"></script>
<script src="{{url('assets/js/material.min.js')}}"></script>
<script src="{{url('assets/js/custom.js')}}"></script>
@stack('scripts')
</html>
