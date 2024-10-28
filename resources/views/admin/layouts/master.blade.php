<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/admin')}}/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/vendors/font-awesome/css/font-awesome.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('assets/admin')}}/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/vendors/flag-icon-css/css/flag-icons.min.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('assets/admin')}}/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/admin')}}/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- layouts:partials/probanner -->
      @include('admin.layouts.partials.probanner')
      <!-- layouts:partials/sidebar -->
      @include('admin.layouts.partials.sidebar')
      <!-- layouts -->
      <div class="container-fluid page-body-wrapper">
        <!-- layouts:partials/header -->
        @include('admin.layouts.partials.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            {{-- Change Contents --}}
            @yield('content') 
          </div>
          <!-- content-wrapper ends -->
          <!-- layouts:partials/footer -->
          @include('admin.layouts.partials.footer')
          <!-- layouts -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('assets/admin')}}/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('assets/admin')}}/vendors/chart.js/chart.umd.js"></script>
    <script src="{{asset('assets/admin')}}/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="{{asset('assets/admin')}}/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{asset('assets/admin')}}/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="{{asset('assets/admin')}}/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('assets/admin')}}/js/off-canvas.js"></script>
    <script src="{{asset('assets/admin')}}/js/misc.js"></script>
    <script src="{{asset('assets/admin')}}/js/settings.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('assets/admin')}}/js/proBanner.js"></script>
    <script src="{{asset('assets/admin')}}/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>