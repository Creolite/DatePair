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
    <link rel="stylesheet" href="{{_asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{_asset('assets/css/bootstrap-material-design.css')}}">
    <link rel="stylesheet" href="{{_asset('assets/css/ripples.min.css')}}">
    <link rel="stylesheet" href="{{_asset('assets/css/font-awesome.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{_asset('assets/style.css')}}">
    <!-- Colors CSS -->
    <link rel="stylesheet" href="{{_asset('assets/css/colors.css')}}">

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
    {{--<style type="text/css">
        * {
            box-sizing: border-box; !important;
        }
    </style>--}}
</head>
<body>
    <div id="app">
        <main class="py-4">
            <div id="wrapper">
                {{-- Top|Nav container --}}
                <header class="header">
                    <div class="container-fluid">

                        @include('layouts.nav')

                        {{-- Flash message --}}
                        @if($flash = session('message'))

                            @include('components.flash')

                        @endif

                    </div>
                </header>

                {{-- Central container --}}
                @yield('home')

                {{-- Modals --}}
                @guest
                    @if( Route::is('register') )
                        @yield('register')
                    @endif

                    @yield('login')

                @endguest

                {{-- Bottom container --}}
                @include('layouts.footer')

            </div>
        </main>
    </div>
</body>
<script src="{{_asset('assets/js/jquery.js')}}"></script>
<script src="{{_asset('assets/js/bootstrap.js')}}"></script>
<script src="{{_asset('assets/js/ripples.min.js')}}"></script>
<script src="{{_asset('assets/js/material.min.js')}}"></script>
<script src="{{_asset('assets/js/custom.js')}}"></script>
@stack('scripts')
</html>
