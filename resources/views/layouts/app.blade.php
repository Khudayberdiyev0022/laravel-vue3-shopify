<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bundles/prism/prism.css') }}">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
  <link rel='shortcut icon' type='image/x-icon' href='{{ asset('assets/img/favicon.ico') }}'/>
  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  <style>
    .card .card-header .btn:not(.note-btn) {
      border-radius: 0;
    }
  </style>
</head>
<body>
<div class="loader"></div>
<div id="app">
  <div class="main-wrapper main-wrapper-1">
    @include('includes.sidebar')
    <!-- Main Content -->
    <div class="main-content">
      <section class="section">
        @yield('content')
      </section>
    </div>
  </div>
</div>

<!-- General JS Scripts -->
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<!-- JS Libraries -->
{{--<script src="{{ asset('assets/bundles/prism/prism.js') }}"></script>--}}
{{--<script src="{{ asset('assets/bundles/apexcharts/apexcharts.min.js') }}"></script>--}}
<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/index.js') }}"></script>
<!-- Template JS File -->
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<!-- Custom JS File -->
<script src="{{ asset('assets/js/custom.js') }}"></script>

</body>
</html>
