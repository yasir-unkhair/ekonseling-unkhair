<div>
    <div class="modal fade" wire:ignore.self id="{{ $modalID }}" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Pengajuan Konseling</h5>
                    <button type="button" class="close" wire:click="reset_form">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="save">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="inputAddress">Konselor <sup class="text-danger">*</sup></label>
                            <select class="form-control" wire:model.live="counselor_id">
                                <option value="">-- Pilih Konselor --</option>
                                @foreach ($counselors as $counselor)
                                    <option value="{{ $counselor->id }}">{{ $counselor->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                            @if ($spesialisasi != null)
                                <div class="mt-2">
                                    <label for="inputAddress" class="mb-0">Spesialisasi: </label> <br>
                                    {!! $spesialisasi !!}
                                </div>
                            @endif

                            @if ($jadwal != null)
                                <div class="mt-2">
                                    <label for="inputAddress" class="mb-0">Jadwal: </label> <br>
                                    {!! $jadwal !!}
                                </div>
                            @endif
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="inputAddress">Kategori Konseling <sup class="text-danger">*</sup></label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" wire:model="category" value="pribadi"
                                    {{ $category == 'pribadi' ? 'checked' : '' }}>
                                <label class="form-check-label" for="gridRadios1">Pribadi</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" wire:model="category" value="kelompok"
                                    {{ $category == 'kelompok' ? 'checked' : '' }}>
                                <label class="form-check-label" for="gridRadios2">Kelompok</label>
                            </div>
                            @error('category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">Tanggal dan Jam <sup class="text-danger">*</sup></label>
                            <div class="row">
                                <div class="col-6">
                                    <input type="date" class="form-control" id="date" wire:model="date">
                                    @error('date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <div class="input-group">
                                        <input type="time" class="form-control" id="time" wire:model="time"
                                            placeholder="contoh: 12:00" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">WIT</span>
                                        </div>
                                    </div>
                                    @error('time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">Deskripsi Permasalahan <sup class="text-danger">*</sup></label>
                            <textarea class="form-control" id="description" rows="4" wire:model="description"
                                placeholder="Deskripsikan permasalahan yang sedang kamu hadapi.."></textarea>
                            @error('description')
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
