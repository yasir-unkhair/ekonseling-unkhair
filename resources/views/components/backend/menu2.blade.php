@props(['href', 'icon', 'active'])

<li class="nav-item pcoded-hasmenu {{ $active ? 'active pcoded-trigger' : '' }}">
    <a href="#!" class="nav-link ">
        <span class="pcoded-micon"><i class="feather icon-{{ $icon }}"></i></span>
        <span class="pcoded-mtext">{{ $slot }}</span>
    </a>
    <ul class="pcoded-submenu">
        {{ $submenu ?? '' }}
    </ul>
</li>
