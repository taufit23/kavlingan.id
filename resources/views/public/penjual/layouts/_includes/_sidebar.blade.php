<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
<aside id="colorlib-aside" role="complementary" class="js-fullheight">
    <nav id="colorlib-main-menu" role="navigation">
        <ul>
            @if (auth()->user()->role == 'Penjual')
                @if (auth()->user()->status == 1)
                    <li class="{{ Request::is('penjual') ? 'colorlib-active' : '' }}">
                        <a href="{{ route('penjual.index') }}">Dashboard</a>
                    </li>
                    <li class="{{ Request::is('penjual/data_tanah') ? 'colorlib-active' : '' }}">
                        <a href="{{ route('penjual.data_tanah') }}">Data Tanah</a>
                    </li>
                    <li class="{{ Request::is('/messanger') ? 'colorlib-active' : '' }}">
                        <a target="blank" href="/messanger">Chat</a>
                    </li>
                @endif
            @elseif (auth()->user()->role == 'Pembeli')
            @endif
            <li class="{{ Request::is('Ndashboard') ? 'colorlib-active' : '' }}">
                <a href="{{ route('profil') }}">Profil</a>
            </li>
        </ul>
    </nav>

    <div class="colorlib-footer">
        <h1 id="colorlib-logo" class="mb-4">
            <a href="{{ route('home.index') }}"
                style="background-image: url(publik/penjual/images/bg_1.jpg); font-size: 350%;"><span>K</span>
            </a>
        </h1>
    </div>
</aside>
