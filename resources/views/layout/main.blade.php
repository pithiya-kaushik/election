<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>@yield('pageTitle') | {{ env('APP_NAME') }}</title>

  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/css/style.css" rel="stylesheet">
  
  <link href="/assets/css/style.css" rel="stylesheet">

  @yield('css')
</head>

<body>
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      @if (!Auth::guest())
      <a href="#" class="logo d-flex align-items-center">
        <img src="/assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Election</span>
        <div class="iconslist">
        <a href="{{ route('admin.logout') }}" style="margin-left: 580%">
          <i class="bi bi-box-arrow-in-right"></i>
          </a>
      </div>
      </a>
       <a class="nav-link nav-profile d-flex align-items-center pe-0" style="margin-left: 105%">
        <img src="/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle" style="width:50px">
        <span class="d-none d-md-block ps-2">{{ Auth::user()->name }}</span>
      </a>
      
      @endif
    </div>
    <nav class="header-nav ms-auto">
      
    </nav>
  </header>
  <main id="main" class="main">
    <div class="pagetitle">
      <nav>
        
      </nav>
    </div>

    <section class="section dashboard">
      @include('layout.sidebar')
  
      @yield('content')
 
      @include('layout.footer')
    </section>
  </main>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="/assets/vendor/echarts/echarts.min.js"></script>
  <script src="/assets/vendor/quill/quill.min.js"></script>
  <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>
  <script src="/assets/js/main.js"></script>
  @yield('js')
</body>

</html>