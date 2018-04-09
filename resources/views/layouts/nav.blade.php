<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            {{-- Toggle icon | Brand --}}
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">
                <i class="material-icons">book</i> {{ config('app.name', 'Laravel') }}
            </a>
        </div>

        <div class="row navbar-collapse collapse navbar-responsive-collapse">
            {{-- Navbar right --}}
            <div class="col-sm-2 nopadding">
                <ul class="nav navbar-nav">
                    {{--<li class="active"><a href="{{url('/')}}"  style="border: solid 1px greenyellow; padding: 30px 15px;">Home</a></li>--}}
                    <li class="active"><a href="{{url('/')}}">Home</a></li>
                    <li class="dropdown hasmenu">
                        <a href="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Site Map
                            <b class="caret"></b>
                        </a>
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
                </ul>
            </div>

            <div class="col-sm-5 nopadding">
                <ul class="site-search" style="list-style:none;">
                    <li style="width: 100%; border: solid 2px red; border-radius: 25px; padding: 1px;">
                        @include('components.search')
                    </li>
                </ul>
            </div>

            {{-- Navbar left --}}
            <div class="">
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
                        @unless( Route::is('new_topic') )
                            <li><a href="{{route('newTopic')}}">New Topic</a></li>
                        @endunless

                        <li class="dropdown hasmenu">
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
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>