<li class="nav-item pcoded-menu-caption">
    <label>Navigation</label>
</li>

@if (Auth::user()->role == 'admin')
    <x-backend.menu href="{{ route('admin.dashboard') }}" icon="home" active="{{ Route::is('admin.dashboard') }}">
        Dashboard
    </x-backend.menu>

    <x-backend.menu2 href="#" icon="users" active="{{ Route::is('admin.konselor.*') }}">
        Konselor
        <x-slot name="submenu">
            <x-backend.submenu href="{{ route('admin.konselor.add') }}" active="{{ Route::is('admin.konselor.add') }}">
                Tambah
            </x-backend.submenu>

            <x-backend.submenu href="{{ route('admin.konselor.index') }}"
                active="{{ Route::is('admin.konselor.index') }}">
                Daftar
            </x-backend.submenu>
        </x-slot>
    </x-backend.menu2>
@endif

@if (Auth::user()->role == 'counselor')
    <x-backend.menu href="{{ route('counselor.dashboard') }}" icon="home"
        active="{{ Route::is('counselor.dashboard') }}">
        Dashboard
    </x-backend.menu>

    <x-backend.menu2 href="#" icon="user" active="{{ Route::is('counselor.kelengkapan.*') }}">
        Kelengkapan Konselor
        <x-slot name="submenu">
            <x-backend.submenu href="{{ route('counselor.kelengkapan.identitas') }}"
                active="{{ Route::is('counselor.kelengkapan.identitas') }}">
                Identitas Diri
            </x-backend.submenu>

            <x-backend.submenu href="{{ route('counselor.kelengkapan.jadwal') }}"
                active="{{ Route::is('counselor.kelengkapan.jadwal') }}">
                Jadwal & Ketersediaan
            </x-backend.submenu>
        </x-slot>
    </x-backend.menu2>
@endif

@if (Auth::user()->role == 'user')
    <x-backend.menu href="{{ route('user.dashboard') }}" icon="home" active="{{ Route::is('user.dashboard') }}">
        Dashboard
    </x-backend.menu>

    <x-backend.menu href="{{ route('user.profile') }}" icon="user" active="{{ Route::is('user.profile') }}">
        Profil Saya
    </x-backend.menu>

    <x-backend.menu href="{{ route('user.pilih_konselor') }}" icon="users"
        active="{{ Route::is('user.pilih_konselor') }}">
        Daftar Konselor
    </x-backend.menu>

    <x-backend.menu href="{{ route('user.jadwal_konseling.index') }}" icon="calendar"
        active="{{ Route::is('user.jadwal_konseling.index') }}">
        Jadwal Konseling
    </x-backend.menu>

    <x-backend.menu href="{{ '' }}" icon="clock" active="{{ 0 }}">
        Riwayat Konseling
    </x-backend.menu>
@endif
