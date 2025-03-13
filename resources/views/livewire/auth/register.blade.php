<div>
    <div class="modal fade" wire:ignore.self id="{{ $modalID }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form wire:submit.prevent="register">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Registrasi Akun E-Konseling</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="alert alert-info" role="alert">
                                <strong>Informasi:</strong> <br>
                                Mahasiswa Universitas Khairun tidak perlu membuat akun baru. Cukup gunakan akun SIMAK
                                Anda untuk masuk dan mengakses layanan eKonseling dengan mudah.
                            </div>

                            <label for="exampleInputEmail1" class="form-label">
                                Nama Lengkap <sup class="text-danger">*</sup>
                            </label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                wire:model="nama" placeholder="Nama Lengkap">
                            @error('nama')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">
                                Email <sup class="text-danger">*</sup>
                            </label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                wire:model="email" placeholder="Email">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small> <br>
                            @enderror
                            <small class="text-muted">
                                Kami merekomendasikan Anda untuk menggunakan
                                <u class="text-danger">Gmail</u>.
                                Pastikan email yang digunakan <u class="text-danger">Masih Aktif</u>
                                agar proses pengiriman informasi akun tidak terkendala.
                            </small>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">
                                Password <sup class="text-danger">*</sup>
                            </label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                wire:model="password" placeholder="Password">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
