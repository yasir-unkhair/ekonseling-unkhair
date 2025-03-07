<x-backend.app-layout title="{{ $title }}">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ asset('images') }}/banner-img.png" alt="">
                    </div>
                    <div class="col-md-8">
                        <h4 class="font-20">
                            Selamat Datang di e-Konseling!
                        </h4>
                        <h3 class="text-primary">Haii,, {{ Auth::user()->name }}!!</h3>
                        <p>
                            <b>Tentang e-Konseling:</b> <br>
                            e-Konseling adalah platform digital yang bertujuan untuk memberikan akses mudah dan aman
                            bagi pengguna yang membutuhkan layanan bimbingan dan konseling. Dengan sistem ini, kami
                            berharap dapat membantu individu dalam mengatasi tantangan emosional, akademik, maupun
                            sosial melalui konsultasi yang profesional dan terpercaya.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-backend.app-layout>
