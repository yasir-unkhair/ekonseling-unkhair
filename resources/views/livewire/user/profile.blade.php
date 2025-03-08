<div>
    <form wire:submit.prevent="save">
        <h5 class="border-bottom pb-2 text-primary">Informasi Pribadi</h5>
        <div class="form-group">
            <label for="inputAddress">Nama Lengkap <sup class="text-danger">*</sup></label>
            <input type="text" class="form-control" id="name" wire:model="name" placeholder="Nama Lengkap">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="inputAddress">Jenis Kelamin <sup class="text-danger">*</sup></label>
            <div class="form-check">
                <input class="form-check-input" type="radio" wire:model="jk" value="L"
                    {{ $jk == 'L' ? 'checked' : '' }}>
                <label class="form-check-label" for="gridRadios1">Laki-Laki</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" wire:model="jk" value="P"
                    {{ $jk == 'P' ? 'checked' : '' }}>
                <label class="form-check-label" for="gridRadios2">Perempuan</label>
            </div>
            @error('jk')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="inputAddress">Tempat Lahir <sup class="text-danger">*</sup></label>
            <input type="text" class="form-control" id="tempat_lahir" wire:model="tempat_lahir"
                placeholder="Tempat Lahir">
            @error('tempat_lahir')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="inputAddress">Tanggal Lahir <sup class="text-danger">*</sup></label>
            <input type="date" class="form-control" id="tanggal_lahir" wire:model="tanggal_lahir"
                placeholder="Tanggal Lahir">
            @error('tanggal_lahir')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="inputAddress">Email <sup class="text-danger">*</sup></label>
            <input type="email" class="form-control" id="email" wire:model="email" placeholder="Email">
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="inputAddress">Nomor Telepon <sup class="text-danger">*</sup></label>
            <input type="text" class="form-control" id="hp" wire:model="hp"
                placeholder="Contoh: 081234567890">
            @error('hp')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            <small class="text-muted">
                Gunakan nomor yang aktif di <span class="text-primary">WhatsApp</span>
                untuk komunikasi lebih mudah
            </small>
        </div>

        <div class="form-group">
            <label for="inputAddress">Alamat <sup class="text-danger">*</sup></label>
            <input type="text" class="form-control" id="alamat" wire:model="alamat" placeholder="Alamat">
            @error('alamat')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="inputAddress">Institusi <sup class="text-danger">*</sup></label>
            <input type="text" class="form-control" id="institusi" wire:model="institusi" placeholder="Institusi">
            @error('institusi')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="inputAddress">Foto <sup class="text-danger">*</sup></label>
            <div class="row">
                <div class="col-md-2">
                    <img class="img-responsive thumbnail" src="{{ foto_profil($url_foto) }}"
                        style="width:125px; height:140px">
                </div>
                <div class="col-md-10">
                    <input type="file" wire:model="foto" class="form-control">
                    <input type="hidden" wire:model="url_foto">
                    @error('foto')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <small class="text-muted" style="font-size:10px;">
                        Format File: *png, *jpg, *jpeg Maks: 500KB
                    </small>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button>
    </form>

    @push('style')
    @endpush

    @push('script')
    @endpush
</div>
