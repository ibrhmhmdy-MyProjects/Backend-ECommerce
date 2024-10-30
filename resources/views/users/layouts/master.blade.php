<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <title>@yield('title')</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta content="Free HTML Templates" name="keywords">
      <meta content="Free HTML Templates" name="description">

      <!-- Favicon -->
      <link href="img/favicon.ico" rel="icon">

      <!-- Google Web Fonts -->
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">  

      <!-- Font Awesome -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

      <!-- Libraries Stylesheet -->
      <link href="{{asset('assets/users')}}/lib/animate/animate.min.css" rel="stylesheet">
      <link href="{{asset('assets/users')}}/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

      <!-- Customized Bootstrap Stylesheet -->
      <link href="{{asset('assets/users')}}/css/style.css" rel="stylesheet">
  </head>
  <body>
      <!-- Topbar Start -->
      <div class="container-fluid">
        @include('users.layouts.partials.topbar')
      </div>
      <!-- Topbar End -->   
      <!-- Navbar Start -->
      <div class="container-fluid bg-dark mb-30">
        @include('users.layouts.partials.header')
      </div>
      <!-- Navbar End -->
      {{-- Content Page --}}
      @yield('content')
      {{-- End Content Page --}}
      <!-- Footer Start -->
      <div class="container-fluid bg-dark text-secondary mt-5 pt-5">
        @include('users.layouts.partials.footer')
      </div>
      <!-- Footer End -->
      <!-- Back to Top -->
      <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>
      <!-- JavaScript Libraries -->
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
      <script src="{{asset('assets/users')}}/lib/easing/easing.min.js"></script>
      <script src="{{asset('assets/users')}}/lib/owlcarousel/owl.carousel.min.js"></script>
      <!-- Contact Javascript File -->
      <script src="{{asset('assets/users')}}/mail/jqBootstrapValidation.min.js"></script>
      <script src="{{asset('assets/users')}}/mail/contact.js"></script>
      <!-- Template Javascript -->
      <script src="{{asset('assets/users')}}/js/main.js"></script>
  </body>
</html>