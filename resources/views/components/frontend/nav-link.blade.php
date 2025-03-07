@props(['href', 'active'])

<li><a href="{{ $href ?? '#' }}" class="{{ $active ? 'active' : '' }}">{{ $slot }}</a></li>
