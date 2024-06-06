<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ secure_asset('assets/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ secure_asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ secure_asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ secure_asset('assets/vendors/typicons/typicons.css') }}">
  <link rel="stylesheet" href="{{ secure_asset('assets/vendors/simple-line-icons/css/simple-line-icons.css') }}">
  <link rel="stylesheet" href="{{ secure_asset('assets/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ secure_asset('assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/select.dataTables.min.css') }}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ secure_asset('assets/css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ secure_asset('assets/images/favicon.png') }}" />

  <link rel="stylesheet" href="{{ secure_asset('fontawesome-free-6.4.2-web/css/all.min.css') }}">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</head>

<body class="with-welcome-text">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <div class="theme-setting-wrapper">
    </div>

      <!-- partial -->
      @include('template.header')

      <!-- partial:partials/_sidebar.html -->
      @include('template.navAdmin')
      <!-- partial -->
      <div class="main-panel">
        
        <!-- content-wrapper ends -->
        @yield('content')
        <!-- partial:partials/_footer.html -->
        @include('template.footer')

        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ secure_asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ secure_asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ secure_asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ secure_asset('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ secure_asset('assets/js/off-canvas.js' )}}"></script>
  <script src="{{ secure_asset('assets/js/hoverable-collapse.js' )}}"></script>
  <script src="{{ secure_asset('assets/js/template.js' )}}"></script>
  <script src="{{ secure_asset('assets/js/settings.js' )}}"></script>
  <script src="{{ secure_asset('assets/js/todolist.js' )}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ secure_asset('assets/js/jquery.cookie.js' )}}" type="text/javascript"></script>
  <script src="{{ secure_asset('assets/js/dashboard.js'  )}}"></script>
  <script src="{{ secure_asset('assets/js/proBanner.js ' )}}"></script>
  <!-- <script src="../../assets/js/Chart.roundedBarCharts.js"></script> -->
  <!-- End custom js for this page-->
  <script src="{{ secure_asset('fontawesome-free-6.4.2-web/js/all.min.js' )}}"></script>

</body>

</html>