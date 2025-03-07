<x-backend.app-layout title="{{ $title }}">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>{{ $title }}</h5>
                <div class="card-header-right"></div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.konselor.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="inputAddress">Nama Konselor <sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Nama Konselor">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Email <sup class="text-danger">*</sup></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <h5 class="mt-5 border-bottom pb-2 text-primary">Account Login</h5>
                    <div class="form-group">
                        <label for="inputAddress2">Username <sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Username Login">
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputAddress2">Password <sup class="text-danger">*</sup></label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Batal</button>
                </form>
            </div>
        </div>
    </div>
</x-backend.app-layout>
