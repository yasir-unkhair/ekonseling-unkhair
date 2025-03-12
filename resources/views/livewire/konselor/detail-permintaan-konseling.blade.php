<div>
    <div class="modal fade" wire:ignore.self id="{{ $modalID }}" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Detail Permintaan Konseling</h5>
                    <button type="button" class="close" wire:click="hide_modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form wire:submit.prevent="save">
                    <div class="modal-body">
                        <div class="form-group">
                            @if ($konseli != null)
                                <div class="border-bottom pb-2">
                                    <label for="inputAddress" class="mb-0"><b>Nama Konseli:</b> </label> <br>
                                    {{ $konseli }}
                                </div>
                            @endif

                            @if ($kategori != null)
                                <div class="mt-2 border-bottom pb-2">
                                    <label for="inputAddress" class="mb-0"><b>Kategori:</b> </label> <br>
                                    {{ ucwords($kategori) }}
                                </div>
                            @endif

                            @if ($tanggal != null)
                                <div class="mt-2 border-bottom pb-2">
                                    <label for="inputAddress" class="mb-0"><b>Tanggal dan Jam:</b> </label> <br>
                                    {{ $tanggal }}, {{ $jam }}
                                </div>
                            @endif

                            @if ($deskripsi != null)
                                <div class="mt-2 border-bottom pb-2">
                                    <label for="inputAddress" class="mb-0"><b>Deskripsi Permasalahan:</b> </label>
                                    <br>
                                    {{ $deskripsi }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group mt-2">
                            <label for="inputAddress">Status Pemintaan <sup class="text-danger">*</sup></label>
                            <select class="form-control w-25" wire:model="status">
                                <option value="">-- Pilih Status --</option>
                                <option value="pending" {{ $status == 'pending' ? 'selected' : '' }}>
                                    Menunggu Konfirmasi
                                </option>
                                <option value="approved" {{ $status == 'approved' ? 'selected' : '' }}>Diterima</option>
                                <option value="rejected" {{ $status == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="inputAddress">Catatan <sup class="text-danger">*</sup></label>
                            <textarea class="form-control" id="catatan" rows="4" wire:model="catatan"
                                placeholder="Tinggalkan catatan anda..."></textarea>
                            @error('catatan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="hide_modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
