<!DOCTYPE html>
<html lang="en">

@php
    $pengaturan = pengaturan();
    $nama_sub_aplikasi = $pengaturan['nama-sub-aplikasi'];
    $nama_departemen = $pengaturan['nama-departemen'];
    $author = $pengaturan['author'];
    $logo = $pengaturan['logo'];
    $nama_aplikasi = $pengaturan['nama-aplikasi'];
    $alamat = $pengaturan['alamat'];
    $nomor_telepon = $pengaturan['telepon'];
    $email = $pengaturan['email'];
@endphp

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ $title . ' - ' ?? '' }} {{ $nama_sub_aplikasi }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('images') }}/logo.jpg" rel="icon">
    <link href="{{ asset('images') }}/logo.jpg" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('frontend') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('frontend') }}/css/main.css" rel="stylesheet">

    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.14.4/dist/sweetalert2.min.css " rel="stylesheet">

    @stack('style')


</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="{{ asset('images') }}/logo.jpg" alt="" class="mb-2">
                <h1 class="sitename">{{ $nama_aplikasi }}</h1>
            </a>

            <x-frontend.navmenu></x-frontend.navmenu>

            <a href="#" class="btn-getstarted" onclick="login()">MASUK</a> &nbsp;
            <a href="#" class="btn btn-md btn-primary" onclick="register()">REGISTRASI</a>

        </div>
    </header>

    <main class="main">

        {{ $slot }}

        <livewire:auth.login />
        <livewire:auth.register />

    </main>

    <footer id="footer" class="footer dark-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span class="sitename">{{ $nama_sub_aplikasi }}</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>{{ $alamat }}</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>{{ $nomor_telepon }}</span></p>
                        <p><strong>Email:</strong> <span>{{ $email }}</span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.4637635214285!2d127.33293717532068!3d0.7638484631784433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x329cb4f340000001%3A0x688b5edfd183b897!2sRektorat%20Universitas%20Khairun!5e0!3m2!1sen!2sid!4v1740719664527!5m2!1sen!2sid"
                        width="900" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">{{ $nama_aplikasi }}</strong>
                <span>{{ $nama_departemen }}</span>
            </p>
            <div class="credits">
                Designed by <a href="#">{{ $author }}</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- jQuery -->
    <script src="{{ asset('backend/js/jquery/jquery.js') }}"></script>

    <!-- Vendor JS Files -->
    <script src="{{ asset('frontend') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend') }}/vendor/php-email-form/validate.js"></script>
    <script src="{{ asset('frontend') }}/vendor/aos/aos.js"></script>
    <script src="{{ asset('frontend') }}/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('frontend') }}/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('frontend') }}/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="{{ asset('frontend') }}/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{ asset('frontend') }}/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="{{ asset('frontend') }}/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="{{ asset('frontend') }}/js/main.js"></script>

    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.14.4/dist/sweetalert2.all.min.js "></script>


    @stack('script')

    <script type="text/javascript">
        function open_modal(modalID) {
            let modal = bootstrap.Modal.getOrCreateInstance(document.getElementById(
                modalID)); // Returns a Bootstrap modal instance
            modal.show();
        }

        function close_modal(modal) {
            $('#' + modal).modal('hide');
            $("[data-dismiss=modal]").trigger({
                type: "click"
            });
        }

        function login() {
            Livewire.dispatch('show-login');
        }

        function register() {
            //alert('register');
            Livewire.dispatch('show-register');
        }

        window.addEventListener('livewire:init', event => {
            Livewire.on('alert', (event) => {
                Swal.fire({
                    icon: event.type,
                    title: event.title,
                    text: event.message
                });
            });

            Livewire.on('close-modal', (event) => {
                close_modal(event.modal);
            });

            Livewire.on('open-modal', (event) => {
                // alert(event.modal);
                open_modal(event.modal);
            });
        });
    </script>

    @include('sweetalert::alert')

</body>

</html>
