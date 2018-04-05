@extends('layouts.app')

@section('title')
    Home
@endsection

@section('home')
    {{--@include('home.bigBlue')--}}

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-9">

                    @if( Route::is('home') )

                        @include('home.search')

                        @include('topic.featured')

                        @include('home.widget')

                    @endif

                </div>
                <div class="clearfix"></div>
            </div>

            <div class="row">

                @yield('content')

            </div>
        </div>
    </section>

@endsection
