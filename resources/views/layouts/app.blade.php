<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Al-rushd Online School</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('frontend/') }}/assets/img/logo.png" rel="icon">
    <link href="{{ asset('frontend/') }}/assets/img/logo.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="{{ asset('frontend/') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="{{ asset('frontend/') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

    <!-- Main CSS File -->
    <link href="{{ asset('frontend/') }}/assets/css/main.css" rel="stylesheet">
    <style>
        /* Fullscreen container */
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            /*background-color: #ffffff;*/
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999999;
        }

        /* Circular loader */
        .loader {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #3498db;
            border-radius: 50%;
            width: 80px;
            height: 80px;
            animation: spin 1s linear infinite;
        }

        /* Spin animation */
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
        .swal2-title {
            font-size: 16px !important;
        }
        .error_message{
            margin-top: 5px;
        }
    </style>
    

    @yield('css')



</head>

<body>

    <!-- Preloader HTML -->
    <div id="preloader">
        <div class="loader"></div>
    </div>

    @include('layouts.header')

    <main class="main">
        @yield('content')
    </main>


    <!-- @include('layouts.footer') -->


    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('frontend/') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/') }}/assets/vendor/php-email-form/validate.js"></script>
    <script src="{{ asset('frontend/') }}/assets/vendor/aos/aos.js"></script>
    <script src="{{ asset('frontend/') }}/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="{{ asset('frontend/') }}/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{ asset('frontend/') }}/assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="{{ asset('frontend/') }}/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('frontend/') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <!-- Main JS File -->
    <script src="{{ asset('frontend/') }}/assets/js/main.js"></script>
    @if(session('success'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
    </script>
    @endif
    <!-- <script>
        $(document).ready(function() {
            // Step 1 → Step 2
            $('.step-1 .btn-select').on('click', function() {
                $('.step-1').hide();
                $('.step-2').fadeIn();
            });

            // Step 2 → Step 3
            $('.step-2 .btn-select').on('click', function() {
                $('.step-2').hide();
                $('.step-3').fadeIn();
            });

            // Step 3 → Step 4
            $('.step-3 .term-card').on('click', function() {
                $('.step-3').hide();
                $('.step-4').fadeIn();
            });

            // Optional: Highlight selected cards
            $('.year-card, .provision-card, .term-card').on('click', function() {
                $(this).siblings().removeClass('active');
                $(this).addClass('active');
            });
        });
    </script> -->
    <script>
        $('#vatToggle').on('change', function() {
            if ($(this).is(':checked')) {
                // Show prices with VAT
                console.log('VAT enabled');
            } else {
                // Show prices without VAT
                console.log('VAT disabled');
            }
        });
    </script>

    <!-- Optional JavaScript to remove preloader after load -->
    <script>
        window.addEventListener('load', function() {
            document.getElementById('preloader').style.display = 'none';
        });
    </script>

    @yield('script')

</body>

</html>