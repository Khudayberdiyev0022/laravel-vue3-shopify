<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>

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
  .pagination {
    margin-bottom: 0;
  }
  .dropdown-toggle::after {
    vertical-align: middle;
  }
  .dropdown-lang {
    min-width: 6rem;
  }
  .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link.active,
  .sidebar-light-primary .nav-sidebar > .nav-item > .nav-link.active {
    background: #41474d;
    box-shadow: 0 1px 3px rgba(0, 0, 0, .12), 0 1px 2px rgba(0, 0, 0, .24);
  }
  [class*=sidebar-dark-] .nav-sidebar > .nav-item > .nav-treeview {
    padding-left: 15px;
  }
  [class*=sidebar-dark-] .nav-treeview > .nav-item > .nav-link.active,
  [class*=sidebar-dark-] .nav-treeview > .nav-item > .nav-link.active:focus,
  [class*=sidebar-dark-] .nav-treeview > .nav-item > .nav-link.active:hover {
    background: #41474d;
    color: #fff;
  }
  /*label:not(.form-check-label):not(.custom-file-label) {*/
  /*  font-weight: 500;*/
  /*}*/
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <!-- Preloader -->
  {{--    <div class="preloader flex-column justify-content-center align-items-center">--}}
  {{--      <img class="animation__shake" src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">--}}
  {{--    </div>--}}

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">{{ __('main.home') }}</a>
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
        <a href="javascript:void(false)" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" >
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
          <i class="fas fa-power-off"></i>
          {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="Admin Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">Asosiy</li>
          <li class="nav-item">
            <a href="{{ route('index') }}" class="nav-link {{ activeLink('index') }}">
              <i class="nav-icon fas fa-home"></i>
              Bosh sahifa
            </a>
          </li>
          <li class="nav-header">Administrator</li>
          <li class="nav-item">
            <a href="{{ route('roles.index') }}" class="nav-link {{ activeLink('roles.*') }}">
              <i class="nav-icon fas fa-user-shield"></i>
              Rollar
            </a>
          </li>
{{--          @can('permissions.read')--}}
            <li class="nav-item">
              <a href="{{ route('permissions.index') }}" class="nav-link {{ activeLink('permissions.*') }}">
                <i class="nav-icon fas fa-user-check"></i>
                <p>
                  <span>Huquqlar</span>
                </p>
              </a>
            </li>
{{--          @endcan--}}
          <li class="nav-item">
            <a href="{{ route('users.index') }}" class="nav-link {{ activeLink('users.*') }}">
              <i class="nav-icon fas fa-users"></i>
              Foydalanuvchilar
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('languages.index') }}" class="nav-link {{ activeLink('languages.*') }}">
              <i class="nav-icon fas fa-language"></i>
              Tizim tili
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('translations.index') }}" class="nav-link {{ activeLink('translations.*') }}">
              <i class="nav-icon fas fa-language"></i>
              Tarjimalar
            </a>
          </li>
          <li class="nav-header">Universitet</li>
          <li class="nav-item">
            <a href="{{ route('faculties.index') }}" class="nav-link {{ activeLink('faculties.*') }}">
              <i class="nav-icon fas fa-calendar-alt"></i>
             Fakultetlar
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-school"></i>
              <p>
                <span>Guruxlar</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                <span>Talabalar</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                <span>O'qituvchilar</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                <span>O'quv rejasi</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                <span>Fanlar</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                <span>Baxolar</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                <span>O'quv yili</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                <span>So'rovnomalar</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                <span>Diplomlar</span>
              </p>
            </a>
          </li>
          <li class="nav-header">Talabalar</li>
          <li class="nav-item menu-open">
            <a href="javascript:void(false)" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Talabalar
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('bachelors.index') }}" class="nav-link {{ activeLink('bachelors.*') }}">
                  <i class="nav-icon fas fa-graduation-cap"></i>
                  <p>Bakalavr</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('masters.index') }}" class="nav-link {{ activeLink('masters.*') }}">
                  <i class="nav-icon fas fa-user-graduate"></i>
                  <p>Magistr</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('training.index') }}" class="nav-link {{ activeLink('training.*') }}">
                  <i class="nav-icon fas fa-university"></i>
                  <p>Malaka oshirish</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item menu-open">
            <a href="javascript:void(false)" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Imtixon
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('intermediate.index') }}" class="nav-link {{ activeLink('intermediate.*') }}">
                  <i class="nav-icon fas fa-file-alt"></i>
                  <p>Oraliq nazorat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('test.index') }}" class="nav-link {{ activeLink('test.*') }}">
                  <i class="nav-icon fas fa-feather-alt"></i>
                  <p>Test</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('speaking.index') }}" class="nav-link {{ activeLink('speaking.*') }}">
                  <i class="nav-icon fas fa-volume-up"></i>
                  <p>Og'zaki</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('sync.index') }}" class="nav-link {{ activeLink('sync.*') }}">
              <i class="nav-icon fas fa-sync-alt"></i>
              <p>
                <span>Sinxron darslar</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('files.index') }}" class="nav-link {{ activeLink('files.*') }}">
              <i class="nav-icon fas fa-folder-open"></i>
              <p>
                <span>Fayllar boshqaruvi</span>
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Main Sidebar Container End -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
{{--            <x-alert />--}}
            @if(session()->has(['success', 'error', 'warning', 'info'])))
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
