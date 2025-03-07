<div>
    <form wire:submit.prevent="save">
        <h5 class="border-bottom pb-2 text-primary">Informasi Pribadi</h5>
        <div class="form-group">
            <label for="inputAddress">Nama Konselor <sup class="text-danger">*</sup></label>
            <input type="text" class="form-control" id="name" wire:model="name" placeholder="Nama Konselor">
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
            <input type="text" class="form-control" id="hp" wire:model="hp" placeholder="Nomor Telepon">
            @error('hp')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="inputAddress">Alamat <sup class="text-danger">*</sup></label>
            <input type="text" class="form-control" id="alamat" wire:model="alamat" placeholder="Alamat">
            @error('alamat')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <h5 class="mt-5 border-bottom pb-2 text-primary">Pengalaman & Spesialisasi</h5>

        <div class="form-group">
            <label for="inputAddress">Pengalaman <sup class="text-danger">*</sup></label>
            <div class="input-group">
                <input type="number" class="form-control" id="pengalaman" wire:model="pengalaman"
                    placeholder="Pengalaman" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2">tahun</span>
                </div>
            </div>
            @error('pengalaman')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="inputAddress">Spesialisasi <sup class="text-danger">*</sup></label>
            <div wire:ignore>
                <select class="form-control" id="spesialisasi" wire:model="spesialisasi" style="width: 100%;"
                    multiple="multiple" data-placeholder="Pilih Spesialisasi">
                    <option value="">-- Pilih --</option>
                    @foreach ($services as $row)
                        <option value="{{ $row->id }}" {!! in_array($row->id, $spesialisasi_selected) ? 'selected="selected"' : '' !!}>{{ $row->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('spesialisasi')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button>
    </form>

    @push('style')
        <!-- Select2 -->
        <link rel="stylesheet" href="{{ asset('backend') }}/js/select2/css/select2.min.css">
        <link rel="stylesheet" href="{{ asset('backend') }}/js/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    @endpush

    @push('script')
        <!-- Select2 -->
        <script src="{{ asset('backend') }}/js/select2/js/select2.full.min.js"></script>

        <script>
            $(function() {
                //Initialize Select2 Elements
                $('#spesialisasi').select2({
                    theme: 'bootstrap4',
                    //minimumInputLength: 2,
                    cache: true
                }).on('change', function(e) {
                    const selectedValues = $(this).val();
                    @this.set('spesialisasi', selectedValues);
                    console.log('change : ' + selectedValues);
                });
            });
        </script>
    @endpush
</div>
