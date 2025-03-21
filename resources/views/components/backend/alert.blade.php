@props(['type', 'title'])

<div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
    <strong>{{ $title }}</strong> {{ $slot }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
