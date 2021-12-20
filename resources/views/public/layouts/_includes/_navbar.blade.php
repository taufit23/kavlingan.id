<header class="site-navbar py-4 bg-white js-sticky-header site-navbar-target" role="banner">

    <div class="container">
        <div class="row align-items-center">

            <div class="col-6 col-xl-2">
                <h1 class="mb-0 site-logo"><a href="/" class="text-black h2 mb-0">Kavlingan<span
                            class="text-primary">.id</span>

                    </a></h1>
            </div>
            <div class=" col-12 col-md-10 d-none d-xl-block">
                <nav class="site-navigation position-relative text-right" role="navigation">

                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li><a href="/#home-section" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Home</a>
                        </li>
                        <li>
                            <a href="/#beli-section"
                                class="nav-link {{ Request::is('/#beli-section') ? 'active' : '' }}">Data
                                tanah</a>
                        </li>

                        {{-- <li><a href="{{ route('home.jual') }}" class="nav-link">Jual</a></li> --}}
                        {{-- <li><a href="/#testimonials-section" class="nav-link">Testimoni</a></li> --}}
                        {{-- <li><a href="/#blog-section" class="nav-link">Blog</a></li> --}}
                        {{-- <li><a href="{{ route('home.berita') }}" class="nav-link">Berita</a></li> --}}

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item ">
                                    <a class="nav-link {{ Request::is('login') ? 'active' : '' }}"
                                        href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('register') ? 'active' : '' }}"
                                        href="{{ route('register') }}">{{ __('Pendaftaran') }}</a>
                                </li>
                            @endif
                        @else
                            @if (auth()->user()->status != null)
                                <li>
                                    <a href="{{ route('messanger') }}" class="nav-link"
                                        target="blank">{{ __('negosiai & Chat') }}</a>
                                </li>
                            @endif

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <img src="{{ auth()->user()->avatar }}" width="40" height="40" class="rounded-circle">

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    @if (auth()->user()->role == 1)
                                        @if (auth()->user()->status != null)
                                            <a class="dropdown-item" href="{{ route('penjual.index') }}">
                                                {{ __('Jual tanah') }}
                                            </a>
                                        @endif
                                    @elseif (auth()->user()->role == 0)
                                        @if (auth()->user()->status != null)
                                            <a class="dropdown-item" href="{{ route('private.dashboard') }}">
                                                {{ __('Dashboard admin') }}
                                            </a>
                                        @endif
                                    @endif
                                    <a class="dropdown-item" href="{{ route('profil') }}">
                                        {{ __('Profil') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        @endguest
                    </ul>
                </nav>
            </div>


            <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#"
                    class="site-menu-toggle js-menu-toggle text-black float-right"><span
                        class="icon-menu h3"></span></a></div>

        </div>
    </div>

</header>
