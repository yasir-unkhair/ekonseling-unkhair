@props(['href', 'icon', 'active'])

<li class="nav-item">
    <a href="{{ $href ?? '#' }}" class="nav-link {{ $active ? 'active' : '' }}">
        <span class="pcoded-micon"><i class="feather icon-{{ $icon }}"></i></span>
        <span class="pcoded-mtext">{{ $slot }}</span>
    </a>
</li>
