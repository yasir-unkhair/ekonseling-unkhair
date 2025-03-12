<div>
    <div class="modal fade" id="{{ $modalID }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Jadwal Konseling</h5>
                    <button type="button" class="close" wire:click="reset_form">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="save">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputAddress">Hari <sup class="text-danger">*</sup></label>
                            <select class="form-control" wire:model="hari">
                                <option value="">-- Pilih Hari --</option>
                                <option value="Senin" {{ $hari == 'Senin' ? 'selected' : '' }}>Senin</option>
                                <option value="Selasa" {{ $hari == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                                <option value="Rabu" {{ $hari == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                                <option value="Kamis" {{ $hari == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                                <option value="Jumat" {{ $hari == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                                <option value="Sabtu" {{ $hari == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                                <option value="Minggu" {{ $hari == 'Minggu' ? 'selected' : '' }}>Minggu</option>
                            </select>
                            @error('hari')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">Waktu/Jam <sup class="text-danger">*</sup></label>
                            <input type="text" class="form-control" id="jam" wire:model="jam"
                                placeholder="contoh: 12:00 - 13:00">
                            @error('jam')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">Metode <sup class="text-danger">*</sup></label>
                            <select class="form-control" wire:model="metode">
                                <option value="">-- Pilih Metode --</option>
                                <option value="offline" {{ $metode == 'offline' ? 'selected' : '' }}>Offline</option>
                                {{-- <option value="chat" {{ $metode == 'chat' ? 'selected' : '' }}>Chat</option> --}}
                                <option value="video conference" {{ $metode == 'video conference' ? 'selected' : '' }}>
                                    Video Conference (Zoom, Google Meet, Microsoft Teams, WhatsApp Video, dll.)
                                </option>
                            </select>
                            @error('metode')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">Status <sup class="text-danger">*</sup></label>
                            <select class="form-control" wire:model="status">
                                <option value="">-- Pilih Status --</option>
                                <option value="1" {{ $status == '1' ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ $status == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="reset_form">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
