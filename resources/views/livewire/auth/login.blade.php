<div>
    <div class="modal fade" wire:ignore.self id="{{ $modalID }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form wire:submit.prevent="login">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Login E-Konseling</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">
                                Username / Email <sup class="text-danger">*</sup>
                            </label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror"
                                wire:model="username" placeholder="Username/Email">
                            @error('username')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
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
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">
                                Role <sup class="text-danger">*</sup>
                            </label>
                            <select wire:model="role" class="form-control">
                                <option value="">-- Pilih Role --</option>
                                <option value="admin">Admin</option>
                                <option value="counselor">Konselor</option>
                                <option value="user">Konseli</option>
                            </select>
                            @error('role')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
