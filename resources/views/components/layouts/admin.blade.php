<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta
            name="description"
            content="Travelin Responsive HTML Admin Dashboard Template based on Bootstrap 5"
        />
        <meta name="author" content="Hamdani Ash-Sidiq" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Admin Bolam Lombok</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- End fonts -->

        @stack('styles')

        <!-- core:css -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/core/core.css') }}" />
        <!-- endinject -->

        <!-- Plugin css for this page -->
        <link rel="stylesheet" href="{{ asset('assets/vendors/select2/select2.min.css') }}" />
        <link
            rel="stylesheet"
            href="{{ asset('assets/js/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}"
        />
        <!-- End plugin css for this page -->

        <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

        <!-- inject:css -->
        <link rel="stylesheet" href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}" />
        <!-- endinject -->

        <!-- Layout styles -->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />
        <!-- End layout styles -->
    </head>
    <body>
        <div class="main-wrapper">
            <!-- sidebar starts -->
           <x-partials.admin.sidebar/>
           <!-- sidebar Ends -->

           <div class="page-wrapper">
               <!-- navbar Starts -->
               <x-partials.admin.navbar/>
                <!-- navbar Ends -->

                <!-- Page Content Starts -->
                <div class="page-content">
                    <nav
                        class="page-breadcrumb d-flex align-items-center justify-content-between"
                    >
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="dashboard.html">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="dashboard.html">Setting</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                configuration
                            </li>
                        </ol>
                    </nav>

                    {{ $slot }}
                </div>
                <!-- Page Content Ends -->

                <!-- footer Starts -->
                <footer
                    class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small"
                >
                    <p class="text-muted mb-1 mb-md-0">
                        Copyright © 2022
                        <a href="../index.html" target="_blank">Travelin</a>.
                    </p>
                    <p class="text-muted">
                        Powered By
                        <i
                            class="mb-1 text-primary ms-1 icon-sm"
                            data-feather="heart"
                        ></i>
                        Bizberg Themes
                    </p>
                </footer>
                <!-- footer Ends -->
            </div>
        </div>

        <!-- core:js -->
        <script src="{{ asset('assets/vendors/core/core.js') }}"></script>
        <!-- endinject -->

        <!-- Plugin js for this page -->
        <script src="{{ asset('assets/vendors/tinymce/tinymce.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
        <!-- End plugin js for this page -->
        <script src="{{ asset('assets/vendors/axios/axios.min.js') }}"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
        <script src="{{ asset('assets/js/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
        <!-- inject:js -->
        <script src="{{ asset('assets/vendors/feather-icons/feather.min.js') }}"></script>
        <script src="{{ asset('assets/js/template.js') }}"></script>
        <!-- endinject -->

        <!-- Custom js for this page -->
        <script src="{{ asset('assets/js/datepicker.js') }}"></script>

        @stack('scripts')
        <!-- End custom js for this page -->
    </body>
</html>
