<x-frontend.app-layout title="{{ $title }}">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

        <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-item active">
                <img src="{{ asset('frontend') }}/img/hero-carousel/hero-carousel-1.jpg" alt="">
                <div class="carousel-container text-left">
                    <h2>E-Konseling Universitas Khairun<br></h2>
                    <p>
                        <b>E-Konseling</b> merupakan sebuah layanan yang menjadi bagian dari Pusat Pengembangan
                        Pendidikan Akademik dan Profesional (P3AP) sebagai upaya Universitas Khairun untuk memfasilitasi
                        atau membantu mahasiswa dalam menghadapi permasalahan sehari-hari yang mungkin muncul dan
                        mengganggu aktivitas sehari-hari dan berdampak pada performa akademis mahasiswa.
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
            <h2>About</h2>
            <p>About Us<br></p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-12 content" data-aos="fade-up" data-aos-delay="100">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore
                        magna aliqua.
                    </p>

                    <p>Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit
                        in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                        cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                </div>

            </div>

        </div>

    </section><!-- /About Section -->
</x-frontend.app-layout>
