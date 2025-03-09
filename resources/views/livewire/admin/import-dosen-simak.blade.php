<div>
    <div class="modal fade" wire:ignore.self id="{{ $modalID }}" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Import Data Dosen</h5>
                    <button type="button" class="close" wire:click="close_modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="{{ $form }}">
                    <div class="modal-body">
                        @if ($message != null)
                            <x-backend.alert type="{{ $message['type'] }}" title="{{ $message['title'] }}">
                                {{ $message['message'] }}
                            </x-backend.alert>
                        @endif

                        <div class="form-group">
                            <label for="inputAddress">NIDN/NIDK/NUPTK <sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control" id="username" wire:model="username"
                                placeholder="Ketikkan NIDN/NIDK/NUPTK">
                            @error('username')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        @if ($name != null)
                            <div class="mt-2">
                                <label for="inputAddress" class="mb-0">Nama Lengkap: </label> <br>
                                {{ $name }}
                            </div>
                        @endif

                        @if ($email != null)
                            <div class="mt-2">
                                <label for="inputAddress" class="mb-0">Email: </label> <br>
                                {{ $email }}
                            </div>
                        @endif

                        @if ($homebase != null)
                            <div class="mt-2">
                                <label for="inputAddress" class="mb-0">Program Studi: </label> <br>
                                {{ $homebase }}
                            </div>
                        @endif

                    </div>
                    <div class="modal-footer">
                        @if ($form == 'search' && $currentStep == 1)
                            <button type="button" class="btn btn-secondary" wire:click="close_modal">Close</button>
                            <button type="submit" class="btn btn-primary">Cari Data</button>
                        @endif
                        @if ($form == 'save' && $currentStep == 2)
                            <button type="button" class="btn btn-secondary" wire:click="step('1')">Kembali</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
