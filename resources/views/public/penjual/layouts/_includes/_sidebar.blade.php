<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
<aside id="colorlib-aside" role="complementary" class="js-fullheight">
    <nav id="colorlib-main-menu" role="navigation">
        <ul>
            @if (auth()->user()->role_id == 4)
                <li class="{{ Request::is('penjual') ? 'colorlib-active' : '' }}">
                    <a href="{{ route('penjual.index') }}">Home</a>
                </li>
                <li class="{{ Request::is('penjual/data_tanah') ? 'colorlib-active' : '' }}">
                    <a href="{{ route('penjual.data_tanah') }}">Data Tanah</a>
                </li>
            @elseif (auth()->user()->role_id == 3)
            @endif
            <li>
                <a href="{{ route('profil') }}">Profil</a>
            </li>
        </ul>
    </nav>

    <div class="colorlib-footer">
        <h1 id="colorlib-logo" class="mb-4">
            <a href="{{ route('penjual.index') }}"
                style="background-image: url(publik/penjual/images/bg_1.jpg); font-size: 350%;"><span>K</span>
            </a>
        </h1>
    </div>
</aside>
