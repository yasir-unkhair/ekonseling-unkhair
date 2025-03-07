@props(['href', 'active'])

<li class="{{ $active ? 'active' : '' }}"><a href="{{ $href ?? '' }}">{{ $slot }}</a></li>
