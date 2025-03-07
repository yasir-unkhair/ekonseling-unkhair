<x-frontend.app-layout title="{{ $title }}">

    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container d-lg-flex justify-content-between align-items-center">
            <h1 class="mb-2 mb-lg-0">Konselor</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('frontend.beranda') }}">Beranda</a></li>
                    <li class="current">Konselor</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Team Section -->
    <section id="team" class="team section">

        <div class="container">

            <div class="row gy-4">
                @foreach ($counselors as $row)
                    @php
                        $details = json_decode($row->details, true);
                    @endphp
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="team-member d-flex align-items-start">
                            <div class="pic"><img src="{{ asset('images') }}/avatar5.png" class="img-fluid"
                                    alt=""></div>
                            <div class="member-info">
                                <h4>{{ $row->name }}</h4>
                                <span>Pengalaman: {{ $details['pengalaman'] ?? '-' }} tahun</span>
                                <p>
                                    <strong>Spesialisasi:</strong> <br>
                                    @php
                                        $spesialisasi = [];
                                        foreach ($row->spesialisasi as $row):
                                            array_push($spesialisasi, $row->name);
                                        endforeach;
                                        if ($spesialisasi) {
                                            # code...
                                            echo implode(', ', $spesialisasi);
                                        }
                                    @endphp
                                </p>
                                <div class="social">
                                    <a href=""><i class="bi bi-twitter-x"></i></a>
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                    <a href=""> <i class="bi bi-linkedin"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>

    </section><!-- /Team Section -->
</x-frontend.app-layout>
