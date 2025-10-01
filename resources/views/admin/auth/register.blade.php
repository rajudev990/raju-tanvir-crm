<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="icon" type="image/png" href="{{ asset('admin/') }}/assets/images/favicon.png" sizes="16x16" />
    <!-- remix icon font css  -->
    <link rel="stylesheet" href="{{ asset('admin/') }}/assets/css/remixicon.css" />
    <!-- BootStrap css -->
    <link rel="stylesheet" href="{{ asset('admin/') }}/assets/css/lib/bootstrap.min.css" />
    <!-- Apex Chart css -->
    <link rel="stylesheet" href="{{ asset('admin/') }}/assets/css/lib/apexcharts.css" />
    <!-- Data Table css -->
    <link rel="stylesheet" href="{{ asset('admin/') }}/assets/css/lib/dataTables.min.css" />
    <!-- Text Editor css -->
    <link rel="stylesheet" href="{{ asset('admin/') }}/assets/css/lib/editor-katex.min.css" />
    <link rel="stylesheet" href="{{ asset('admin/') }}/assets/css/lib/editor.atom-one-dark.min.css" />
    <link rel="stylesheet" href="{{ asset('admin/') }}/assets/css/lib/editor.quill.snow.css" />
    <!-- Date picker css -->
    <link rel="stylesheet" href="{{ asset('admin/') }}/assets/css/lib/flatpickr.min.css" />
    <!-- Calendar css -->
    <link rel="stylesheet" href="{{ asset('admin/') }}/assets/css/lib/full-calendar.css" />
    <!-- Vector Map css -->
    <link rel="stylesheet" href="{{ asset('admin/') }}/assets/css/lib/jquery-jvectormap-2.0.5.css" />
    <!-- Popup css -->
    <link rel="stylesheet" href="{{ asset('admin/') }}/assets/css/lib/magnific-popup.css" />
    <!-- Slick Slider css -->
    <link rel="stylesheet" href="{{ asset('admin/') }}/assets/css/lib/slick.css" />
    <!-- prism css -->
    <link rel="stylesheet" href="{{ asset('admin/') }}/assets/css/lib/prism.css" />
    <!-- file upload css -->
    <link rel="stylesheet" href="{{ asset('admin/') }}/assets/css/lib/file-upload.css" />

    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('admin/') }}/assets/css/lib/audioplayer.css" />
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('admin/') }}/assets/css/style.css" />
    <style>
        .swal2-title {
            font-size: 16px !important;
        }
    </style>
</head>

<body>
    <div class="dashboard-main-body min-vh-100 d-flex justify-content-center align-items-center">
        <div class="row w-100">
            <div class="col-lg-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0 text-center">Admin Register</h5>
                    </div>
                    <div class="card-body">
                        <form class="row gy-3 needs-validation" novalidate method="POST" action="{{ route('admin.register') }}">
                            @csrf

                            <div class="col-md-12">
                                <label class="form-label">Name</label>
                                <div class="icon-field has-validation">
                                    <span class="icon">
                                        <iconify-icon icon="mage:user"></iconify-icon>
                                    </span>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name"
                                        required>
                                    @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Email</label>
                                <div class="icon-field has-validation">
                                    <span class="icon">
                                        <iconify-icon icon="mage:email"></iconify-icon>
                                    </span>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email"
                                        required>
                                    @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Password</label>
                                <div class="icon-field has-validation">
                                    <span class="icon">
                                        <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                                    </span>
                                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="*******"
                                        required>
                                    @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-md-12">
                                <label class="form-label">Confirm Password</label>
                                <div class="icon-field has-validation">
                                    <span class="icon">
                                        <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                                    </span>
                                    <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="*******"
                                        required>
                                    @error('password_confirmation')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 text-end">
                                <button class="btn btn-sm btn-success-600" type="submit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery library js -->
    <script src="{{ asset('admin/') }}/assets/js/lib/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('admin/') }}/assets/js/lib/bootstrap.bundle.min.js"></script>
    <!-- Apex Chart js -->
    <script src="{{ asset('admin/') }}/assets/js/lib/apexcharts.min.js"></script>
    <!-- Data Table js -->
    <script src="{{ asset('admin/') }}/assets/js/lib/dataTables.min.js"></script>
    <!-- Iconify Font js -->
    <script src="{{ asset('admin/') }}/assets/js/lib/iconify-icon.min.js"></script>
    <!-- jQuery UI js -->
    <script src="{{ asset('admin/') }}/assets/js/lib/jquery-ui.min.js"></script>
    <!-- Vector Map js -->
    <script src="{{ asset('admin/') }}/assets/js/lib/jquery-jvectormap-2.0.5.min.js"></script>
    <script src="{{ asset('admin/') }}/assets/js/lib/jquery-jvectormap-world-mill-en.js"></script>
    <!-- Popup js -->
    <script src="{{ asset('admin/') }}/assets/js/lib/magnifc-popup.min.js"></script>
    <!-- Slick Slider js -->
    <script src="{{ asset('admin/') }}/assets/js/lib/slick.min.js"></script>
    <!-- prism js -->
    <script src="{{ asset('admin/') }}/assets/js/lib/prism.js"></script>
    <!-- file upload js -->
    <script src="{{ asset('admin/') }}/assets/js/lib/file-upload.js"></script>
    <!-- audioplayer -->
    <script src="{{ asset('admin/') }}/assets/js/lib/audioplayer.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- main js -->
    <script src="{{ asset('admin/') }}/assets/js/app.js"></script>

    <script src="{{ asset('admin/') }}/assets/js/homeTwoChart.js"></script>

    <script>
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>
    <script>
        let table = new DataTable('#dataTable');
    </script>

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
    @if(session('error'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: "{{ session('error') }}",
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
</body>

</html>