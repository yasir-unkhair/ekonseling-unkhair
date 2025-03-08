<!DOCTYPE html>
<html lang="en">

@php
    $pengaturan = pengaturan();
    $nama_sub_aplikasi = $pengaturan['nama-sub-aplikasi'];
    $nama_departemen = $pengaturan['nama-departemen'];
    $author = $pengaturan['author'];
    $logo = $pengaturan['logo'];
    $nama_aplikasi = $pengaturan['nama-aplikasi'];
@endphp

<head>
    <title>{{ $title . ' - ' ?? '' }} {{ $nama_sub_aplikasi }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('backend') }}/images/favicon.ico" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('backend') }}/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href=" https://cdn.jsdelivr.net/npm/sweetalert2@11.14.4/dist/sweetalert2.min.css " rel="stylesheet">

    @stack('style')


    <style>
        .warna-success {
            background-color: #d4edda;
        }

        .warna-info {
            background-color: #d1ecf1;
        }

        .warna-warning {
            background-color: #fff3cd;
        }

        .warna-danger {
            background-color: #f8d7da;
        }

        .warna-primary {
            background-color: #cce5ff;
        }
    </style>


</head>

<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar  ">
        <div class="navbar-wrapper  ">
            <div class="navbar-content scroll-div ">

                <div class="">
                    <div class="main-menu-header">
                        <img class="img-radius" src="{{ foto_profil(Auth::user()->foto) }}" alt="User-Profile-Image">
                        <div class="user-details">
                            <span>{{ Auth::user()->name }}</span> <br>
                            <span class="badge badge-light-warning">{{ ucfirst(Auth::user()->role) }}</span>
                        </div>
                    </div>
                </div>

                <ul class="nav pcoded-inner-navbar ">

                    <x-backend.sidebar></x-backend.sidebar>

                </ul>

                <div class="card text-center">
                    <a href="{{ route('admin.logout') }}" onclick="confirm('Yakin ingin logout?')"
                        class="btn btn-danger btn-sm text-white m-0">
                        <i class="fa fa-power-off"></i>
                        Logout
                    </a>
                </div>

            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->
    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">


        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            <a href="#!" class="b-brand">
                <!-- ========   change your logo hear   ============ -->
                <span style="font-size: 18px; font-weight: bold;">E-Konseling</span>
            </a>
            <a href="#!" class="mob-toggler">
                <i class="feather icon-more-vertical"></i>
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">

            </ul>
            <ul class="navbar-nav ml-auto">
                <li>
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                            <i class="icon feather icon-bell"></i>
                            <span class="badge badge-pill badge-danger">5</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right notification">
                            <div class="noti-head">
                                <h6 class="d-inline-block m-b-0">Notifications</h6>
                                <div class="float-right">
                                    <a href="#!" class="m-r-10">mark as read</a>
                                    <a href="#!">clear all</a>
                                </div>
                            </div>
                            <ul class="noti-body">
                                <li class="n-title">
                                    <p class="m-b-0">NEW</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="{{ asset('backend') }}/images/user/avatar-1.jpg"
                                            alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>John Doe</strong><span class="n-time text-muted"><i
                                                        class="icon feather icon-clock m-r-10"></i>5 min</span></p>
                                            <p>New ticket Added</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="n-title">
                                    <p class="m-b-0">EARLIER</p>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="{{ asset('backend') }}/images/user/avatar-2.jpg"
                                            alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Joseph William</strong><span class="n-time text-muted"><i
                                                        class="icon feather icon-clock m-r-10"></i>10 min</span></p>
                                            <p>Prchace New Theme and make payment</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="{{ asset('backend') }}/images/user/avatar-1.jpg"
                                            alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Sara Soudein</strong><span class="n-time text-muted"><i
                                                        class="icon feather icon-clock m-r-10"></i>12 min</span></p>
                                            <p>currently login</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="notification">
                                    <div class="media">
                                        <img class="img-radius" src="{{ asset('backend') }}/images/user/avatar-2.jpg"
                                            alt="Generic placeholder image">
                                        <div class="media-body">
                                            <p><strong>Joseph William</strong><span class="n-time text-muted"><i
                                                        class="icon feather icon-clock m-r-10"></i>30 min</span></p>
                                            <p>Prchace New Theme and make payment</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="noti-footer">
                                <a href="#!">show all</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="feather icon-user"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
                            <div class="pro-head">
                                <img src="{{ foto_profil(Auth::user()->foto) }}" class="img-radius"
                                    alt="User-Profile-Image">
                                <span>{{ Auth::user()->name }}</span>
                                @php
                                    $role = Auth::user()->role;
                                @endphp
                                @if ($role == 'admin')
                                    <a href="{{ route('admin.logout') }}" onclick="confirm('Yakin ingin logout?')"
                                        class="dud-logout" title="Logout">
                                        <i class="feather icon-log-out"></i>
                                    </a>
                                @endif

                                @if ($role == 'counselor')
                                    <a href="{{ route('counselor.logout') }}"
                                        onclick="confirm('Yakin ingin logout?')" class="dud-logout" title="Logout">
                                        <i class="feather icon-log-out"></i>
                                    </a>
                                @endif

                                @if ($role == 'user')
                                    <a href="{{ route('user.logout') }}" onclick="confirm('Yakin ingin logout?')"
                                        class="dud-logout" title="Logout">
                                        <i class="feather icon-log-out"></i>
                                    </a>
                                @endif
                            </div>
                            <ul class="pro-body">
                                <li><a href="#" class="dropdown-item"><i class="feather icon-user"></i>
                                        Profile</a></li>
                                <li><a href="#" class="dropdown-item"><i class="feather icon-mail"></i> My
                                        Messages</a></li>
                                <li><a href="#" class="dropdown-item"><i class="feather icon-lock"></i> Lock
                                        Screen</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <!-- [ Header ] end -->



    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">{{ $title ?? '' }}</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html"><i
                                            class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#!">{{ $title ?? '' }}</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">

                {{ $slot }}

            </div>
            <!-- [ Main Content ] end -->
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('backend/js/jquery/jquery.js') }}"></script>

    <!-- Required Js -->
    <script src="{{ asset('backend') }}/js/vendor-all.min.js"></script>
    <script src="{{ asset('backend') }}/js/plugins/bootstrap.min.js"></script>
    <script src="{{ asset('backend') }}/js/pcoded.min.js"></script>

    <!-- custom-chart js -->
    <script src="{{ asset('backend') }}/js/pages/dashboard-main.js"></script>

    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.14.4/dist/sweetalert2.all.min.js "></script>

    @stack('script')

    <script type="text/javascript">
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }

        function popupWindow(url, title, w, h) {
            var y = window.outerHeight / 2 + window.screenY - (h / 2)
            var x = window.outerWidth / 2 + window.screenX - (w / 2)
            return window.open(url, title,
                'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width=' +
                w + ', height=' + h + ', top=' + y + ', left=' + x);
        }

        function handleFileUpload(form_name) {
            var form = document.getElementById(form_name);
            $("#loading-" + form_name).html('<span class="text-primary">Sedang proses upload...</span>')

            form.submit();
        }

        function copy(params) {
            var copyText = params;
            navigator.clipboard.writeText(copyText);
            $('.copytext').html('Copied!');
        }

        function upperCaseFirst(str) {
            return str.charAt(0).toUpperCase() + str.substring(1);
        }

        function open_modal(modal) {
            $('#' + modal).modal({
                backdrop: 'static',
                keyboard: false,
                show: true
            });
        }

        function close_modal(modal) {
            $('#' + modal).modal('hide');
            $("[data-dismiss=modal]").trigger({
                type: "click"
            });
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
                open_modal(event.modal);
            });

            Livewire.on('load-datatable', (event) => {
                table.draw();
            });
        });
    </script>

    @include('sweetalert::alert')
</body>

</html>
