<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="shortcut icon" href="{{ asset('assets/images/logo.svg') }}" type="image/x-icon"/>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  {{--  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">--}}
  <!-- Tempusdominus Bootstrap 4 -->
  {{--  <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">--}}
  <!-- iCheck -->
  {{--  <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">--}}
  <!-- JQVMap -->
  {{--  <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}">--}}
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  {{--  <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">--}}
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
  @stack('css')

</head>
<style>
  .loading {
    position: relative;
    min-height: 100vh;
    opacity: .5;
  }
  .loading p {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
  label {
    font-weight: normal !important;
  }
  .required:after {
    content: " *";
    color: red;
  }
  #preview-image {
    width: 100%;
    height: 250px;
    object-position: center;
    object-fit: contain;
    border: 1px solid #ced4da;
    border-radius: 4px;
  }
  .pagination {
    margin-bottom: 0;
  }
  .dropdown-toggle::after {
    vertical-align: middle;
  }
  .dropdown-lang {
    min-width: 6rem;
  }
  [class*=sidebar-dark-] {
    background: #114980;
  }
  .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link.active,
  .sidebar-light-primary .nav-sidebar > .nav-item > .nav-link.active {
    background: #1e5b97;
    box-shadow: 0 1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24);
  }
  [class*=sidebar-dark] .btn-sidebar, [class*=sidebar-dark] .form-control-sidebar {
    background: #1e5b97;
  }
  [class*=sidebar-dark-] .nav-sidebar > .nav-item > .nav-treeview {
    padding-left: 15px;
  }
  [class*=sidebar-dark-] .nav-treeview > .nav-item > .nav-link.active,
  [class*=sidebar-dark-] .nav-treeview > .nav-item > .nav-link.active:focus,
  [class*=sidebar-dark-] .nav-treeview > .nav-item > .nav-link.active:hover {
    background: #1e5b97;
    color: #fff;
  }
  .icheck-primary > input:first-child:checked + input[type=hidden] + label::before,
  .icheck-primary > input:first-child:checked + label::before {
    background-color: #114980;
  }
  .btn-primary {
    background-color: #114980;
  }

  .page-item.active .page-link {
    background-color: #114980;
  }
  .btn-primary:hover {
    background-color: #1e5b97;
    border-color: transparent;
  }
  .page-link:focus {
    box-shadow: none;
  }
  .brand-link {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }
  .sidebar-collapse .brand-link__sidebar {
    padding: 5px;
  }
  .sidebar-collapse .brand-image {
    margin-bottom: 0 !important;

  }
  .sidebar-collapse .brand-name {
    display: none;
  }
  .brand-link__sidebar {
    /*display: flex;*/
    /*flex-direction: column;*/
    /*justify-content: center;*/
    /*align-items: center;*/
    padding: 15px 20px;
    text-align: center;
    /*background: #145493;*/
    /*border-radius: 0 0 35px 35px;*/
  }
  /*.brand-logo__img {*/
  /*  width: 150px;*/
  /*  height: 150px;*/
  /*  margin: auto;*/
  /*}*/
  .brand-image {
    width: 100%;
    height: 100%;
    max-height: 150px;
    object-fit: contain;
    object-position: center;
  }
  .brand-name {
    display: block;
    font-size: 20px;
    line-height: 24px;
    color: #fff;
  }
  /*.preloader {*/
  /*  background: #fff;*/
  /*}*/
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <!-- Preloader -->
{{--  <div class="preloader flex-column justify-content-center align-items-center">--}}
{{--    <img class="animation__shake" src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">--}}
{{--  </div>--}}

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" class="nav-link">{{ __('main.home') }}</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">{{ __('main.contact') }}</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <!-- Languages Dropdown Menu -->
      @php($languages = \App\Models\Language::getActive())
      <li class="nav-item dropdown">
        <a href="javascript:void(false)" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
          {{ $languages->firstWhere('id', app()->getLocale())?->name }}
        </a>
        <div class="dropdown-menu dropdown-lang">
          @foreach($languages as $language)
            @if($language->id != app()->getLocale())
              <a href="{{ route('change.language', $language->id) }}" class="dropdown-item">
                {{ $language->name }}
              </a>
            @endif
          @endforeach
        </div>
      </li>

      <li class="nav-item">
        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
          <i class="fas fa-power-off mr-1"></i>
          {{ __('main.logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('components.sidebar')
  <!-- Main Sidebar Container End -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('breadcrumb')
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            {{--            <x-alert />--}}
            @if(session()->has(['success', 'error', 'warning', 'info']))
              )
              @include('components.alert')
            @endif
            {{ $slot ?? ''}}
            @yield('content')
          </div>
        </div>
      </div>
    </div>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-{{ date('Y') }} <a href="#">Admin Dashboard</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Laravel v</b> {{ app()->version() }} PHP v {{ PHP_VERSION }}
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 5 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
{{--<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>--}}
<!-- Sparkline -->
{{--<script src="{{ asset('assets/plugins/sparklines/sparkline.js') }}"></script>--}}
<!-- JQVMap -->
{{--<script src="{{ asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>--}}
<!-- jQuery Knob Chart -->
{{--<script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>--}}
<!-- daterangepicker -->
{{--<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>--}}
<!-- Tempusdominus Bootstrap 4 -->
{{--<script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>--}}
<!-- Summernote -->
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
{{--<script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>--}}
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
{{--<script src="{{ asset('assets/dist/js/demo.js') }}"></script>--}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="{{ asset('assets/dist/js/pages/dashboard.js') }}"></script>--}}
@stack('script')

<script>

    // window.addEventListener('keydown', e => {
    //     console.log(e);
    //     if (e.key === 'Escape') {
    //         $('#add').modal('hide');
    //         $('#edit').modal('hide');
    //         $('#delete').modal('hide');
    //         $('#show').modal('hide');
    //     }
    // });
    window.addEventListener('close-modal', e => {
        $('#create').modal('hide');
        $('#show').modal('hide');
        $('#edit').modal('hide');
        $('#delete').modal('hide');
        // if (e.currentTarget.key === 'Escape') {
        //     console.log('ok')
        // }
    });
    window.addEventListener('show-create', () => {
        $('#create').modal('show');
    });
    window.addEventListener('show-view', () => {
        $('#show').modal('show');
    });
    window.addEventListener('show-edit', () => {
        $('#edit').modal('show');
    });
    window.addEventListener('show-delete', () => {
        $('#delete').modal('show');
    });

</script>
</body>
</html>
