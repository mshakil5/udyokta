<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-navbar-fixed layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{ asset('assets/admin/')}}"
  data-template="vertical-menu-template-no-customizer">
  <head>
    <meta charset="utf-8" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/admin/')}}img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/fonts/fontawesome.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/fonts/tabler-icons.css')}}" />
    <!-- <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" /> -->

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/css/rtl/core.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/css/rtl/theme-default.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/libs/node-waves/node-waves.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/libs/typeahead-js/typeahead.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/libs/apex-charts/apex-charts.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/libs/swiper/swiper.css')}}" />
    {{-- <link rel="stylesheet" href="{{ asset('assets/admin/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" /> --}}

    
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendor/css/pages/cards-advance.css')}}" />

    <!-- Helpers -->
    <script src="{{ asset('assets/admin/vendor/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/admin/js/config.js')}}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        

        @include('admin.inc.sidebar')

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="ti ti-menu-2 ti-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="../../assets/img/avatars/1.png" alt class="h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="auth-login-cover.html" target="_blank">
                        <i class="ti ti-logout me-2 ti-sm"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            
            @yield('content')

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
                  <div>
                    ©
                    <script>
                      document.write(new Date().getFullYear());
                    </script>
                    , made with ❤️ by <a href="https://pixinvent.com" target="_blank" class="fw-medium">Pixinvent</a>
                  </div>
                  
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->

    <script src="{{ asset('assets/admin/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{ asset('assets/admin/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{ asset('assets/admin/vendor/js/bootstrap.js')}}"></script>
    <script src="{{ asset('assets/admin/vendor/libs/node-waves/node-waves.js')}}"></script>
    <script src="{{ asset('assets/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('assets/admin/vendor/libs/hammer/hammer.js')}}"></script>
    <script src="{{ asset('assets/admin/vendor/libs/i18n/i18n.js')}}"></script>
    <script src="{{ asset('assets/admin/vendor/libs/typeahead-js/typeahead.js')}}"></script>
    <script src="{{ asset('assets/admin/vendor/js/menu.js')}}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/admin/vendor/libs/apex-charts/apexcharts.js')}}"></script>
    <script src="{{ asset('assets/admin/vendor/libs/swiper/swiper.js')}}"></script>
    {{-- <script src="{{ asset('assets/admin/vendor/libs/datatables-bs5/datatables-bootstrap5.js')}}"></script>
    <script src="{{ asset('assets/admin/js/tables-datatables-basic.js')}}"></script> --}}

    <!-- Main JS -->
    <script src="{{ asset('assets/admin/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/admin/js/dashboards-analytics.js')}}"></script>

    
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>


    @yield('script')

    
  </body>
</html>
