<nav id="navmenu" class="navmenu">
    <ul>
        <x-frontend.nav-link href="{{ route('frontend.beranda') }}"
            active="{{ Route::is(['frontend.beranda', 'frontend.index']) }}">
            Beranda
        </x-frontend.nav-link>
        <x-frontend.nav-link href="{{ route('frontend.konselor') }}" active="{{ Route::is('frontend.konselor') }}">
            Konselor
        </x-frontend.nav-link>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>
