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
                        <li><a href="/#home-section" class="nav-link active">Home</a></li>
                        <li><a href="/#beli-section" class="nav-link">Beli</a></li>
                        {{-- <li><a href="{{ route('home.jual') }}" class="nav-link">Jual</a></li> --}}
                        <li><a href="/#testimonials-section" class="nav-link">Testimoni</a></li>
                        <li><a href="/#blog-section" class="nav-link">Blog</a></li>
                        <li><a href="{{ route('home.berita') }}" class="nav-link">Berita</a></li>
                        <li><a href="#" class="nav-link">Kontak</a></li>

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profil') }}">
                                        {{ __('Profil') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        @endguest

                        {{-- <li><a href="#" class="nav-link">Login</a></li> --}}
                    </ul>
                </nav>
            </div>


            <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#"
                    class="site-menu-toggle js-menu-toggle text-black float-right"><span
                        class="icon-menu h3"></span></a></div>

        </div>
    </div>

</header>
