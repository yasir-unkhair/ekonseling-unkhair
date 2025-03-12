<x-frontend.app-layout title="{{ $title }}">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

        <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-item active">
                <img src="{{ asset('images/konseling-online.jpg') }}" alt="">
                <div class="carousel-container text-center">
                    <h2>E-Konseling Universitas Khairun</h2>
                    <p>
                        <b>E-Konseling</b> adalah layanan bimbingan dan konseling yang memanfaatkan teknologi
                        informasi, khususnya internet, di Universitas Khairun untuk membantu mahasiswa
                        dengan berbagai masalah pribadi, sosial, karir, dan akademik.
                    </p>
                    <a href="#featured-services" class="btn-get-started">MASUK</a>
                </div>
            </div><!-- End Carousel Item -->

        </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Help</h2>
            <p>Tahapan e-Konseling<br></p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4 flex-center">
                <div class="col-lg-5 text-center text-md-start">
                    <img src="{{ asset('images/bg3.png') }}" class="img-fluid" width="400">
                </div>

                <div class="col-lg-7 content" data-aos="fade-up" data-aos-delay="100">
                    <h6 class="fw-bold fs-2 fs-lg-3 display-3 lh-sm">Tahapan e-Konseling</h6>
                    <p class="my-4 pe-xl-8">
                    <ol>
                        <li>Klien memilih konselor dan jadwal yang tersedia.</li>
                        <li>Setelah jadwal divalidasi oleh konselor, maka konseling dapat dilakukan.</li>
                        <li>Konseling bisa dilakukan untuk individu maupun kelompok.</li>
                    </ol>
                    </p>
                </div>
            </div>

        </div>

    </section><!-- /About Section -->
</x-frontend.app-layout>
