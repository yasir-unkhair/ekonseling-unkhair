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
                            Selamat Datang di Admin e-Konseling!
                        </h4>
                        <h3 class="text-primary">Haii,, {{ Auth::user()->name }}!!</h3>
                        <p>
                            <b>Tentang e-Konseling:</b> <br>
                            e-Konseling adalah platform digital yang bertujuan untuk memberikan akses mudah dan aman
                            bagi pengguna yang membutuhkan layanan bimbingan dan konseling. Dengan sistem ini, kami
                            berharap dapat membantu individu dalam mengatasi tantangan emosional, akademik, maupun
                            sosial melalui konsultasi yang profesional dan terpercaya.
                        </p>
                        <p>
                            <b>Peran Anda sebagai Admin:</b> <br>
                            Sebagai admin, Anda memiliki peran penting dalam memastikan kelancaran layanan konseling.
                            Dari sini, Anda dapat: <br>
                            <i class="fa fa-arrow-right"></i> Mengelola data pengguna dan konselor. <br>
                            <i class="fa fa-arrow-right"></i> Memantau jadwal dan sesi konseling. <br>
                            <i class="fa fa-arrow-right"></i> Meninjau laporan perkembangan pengguna. <br>
                            <i class="fa fa-arrow-right"></i> Menyediakan lingkungan yang aman dan mendukung bagi mereka
                            yang membutuhkan bantuan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- table card-1 start -->
    <div class="col-md-12 col-xl-4">
        <div class="card flat-card">
            <div class="row-table">
                <div class="col-sm-6 card-body br">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-eye text-c-green mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>10k</h5>
                            <span>Visitors</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-music text-c-red mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>100%</h5>
                            <span>Volume</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-table">
                <div class="col-sm-6 card-body br">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-file-text text-c-blue mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>2000 +</h5>
                            <span>Files</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-mail text-c-yellow mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>120</h5>
                            <span>Mails</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- widget primary card start -->
        <div class="card flat-card widget-primary-card">
            <div class="row-table">
                <div class="col-sm-3 card-body">
                    <i class="feather icon-star-on"></i>
                </div>
                <div class="col-sm-9">
                    <h4>4000 +</h4>
                    <h6>Ratings Received</h6>
                </div>
            </div>
        </div>
        <!-- widget primary card end -->
    </div>
    <!-- table card-1 end -->
    <!-- table card-2 start -->
    <div class="col-md-12 col-xl-4">
        <div class="card flat-card">
            <div class="row-table">
                <div class="col-sm-6 card-body br">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-share-2 text-c-blue mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>1000</h5>
                            <span>Shares</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-wifi text-c-blue mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>600</h5>
                            <span>Network</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-table">
                <div class="col-sm-6 card-body br">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-rotate-ccw text-c-blue mb-1 d-block"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>3550</h5>
                            <span>Returns</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <i class="icon feather icon-shopping-cart text-c-blue mb-1 d-blockz"></i>
                        </div>
                        <div class="col-sm-8 text-md-center">
                            <h5>100%</h5>
                            <span>Order</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- widget-success-card start -->
        <div class="card flat-card widget-purple-card">
            <div class="row-table">
                <div class="col-sm-3 card-body">
                    <i class="fas fa-trophy"></i>
                </div>
                <div class="col-sm-9">
                    <h4>17</h4>
                    <h6>Achievements</h6>
                </div>
            </div>
        </div>
        <!-- widget-success-card end -->
    </div>
    <!-- table card-2 end -->
    <!-- Widget primary-success card start -->
    <div class="col-md-12 col-xl-4">
        <div class="card support-bar overflow-hidden">
            <div class="card-body pb-0">
                <h2 class="m-0">350</h2>
                <span class="text-c-blue">Support Requests</span>
                <p class="mb-3 mt-3">Total number of support requests that come in.</p>
            </div>
            <div id="support-chart"></div>
            <div class="card-footer bg-primary text-white">
                <div class="row text-center">
                    <div class="col">
                        <h4 class="m-0 text-white">10</h4>
                        <span>Open</span>
                    </div>
                    <div class="col">
                        <h4 class="m-0 text-white">5</h4>
                        <span>Running</span>
                    </div>
                    <div class="col">
                        <h4 class="m-0 text-white">3</h4>
                        <span>Solved</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Widget primary-success card end -->
</x-backend.app-layout>
