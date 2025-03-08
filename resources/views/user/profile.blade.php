<x-backend.app-layout title="{{ $title }}">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>{{ $title }}</h5>
                <div class="card-header-right"></div>
            </div>
            <div class="card-body">
                <livewire:user.profile />
            </div>
        </div>
    </div>
</x-backend.app-layout>
