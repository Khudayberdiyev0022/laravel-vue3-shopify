<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <div class="brand-link__sidebar">
    <img src="{{ asset('assets/images/logo.svg') }}" alt="BrandLogo" class="brand-image mb-2">
    <span class="brand-name brand-text font-weight-light">{!! __('main.brand_name') !!}</span>
  </div>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel pb-3 mb-3 d-flex"></div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="{{ __('main.search') }}..." aria-label="Search">
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
        {{--        MAIN     --}}
        <li class="nav-header">{{ __('main.main') }}</li>
        <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link {{ activeLink('home') }}">
            <i class="nav-icon fas fa-home"></i>
            <p>{{ __('main.home') }}</p>
          </a>
        </li>

        {{--        ADMINSTRATION     --}}
        <li class="nav-header">{{ __('main.administrator') }}</li>
        <li class="nav-item">
          <a href="{{ route('roles.index') }}" class="nav-link {{ activeLink('roles*') }}">
            <i class="nav-icon fas fa-lock"></i>
            <p>{{ __('main.roles') }}</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('permissions.index') }}" class="nav-link {{ activeLink('permissions*') }}">
            <i class="nav-icon fas fa-key"></i>
            <p>{{ __('main.permissions') }}</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('users.index') }}" class="nav-link {{ activeLink('users*') }}">
            <i class="nav-icon fas fa-users"></i>
            <p>{{ __('main.users') }}</p>
          </a>
        </li>

        {{--        SETTINGS      --}}
        <li class="nav-header">{{ __('main.settings') }}</li>
        <li class="nav-item">
          <a href="{{ route('nationalities.index') }}" class="nav-link {{ activeLink('nationalities*') }}">
            <i class="nav-icon fas fa-globe-americas"></i>
           <p>{{ __('main.nationalities') }}</p>
          </a>
        </li>
{{--        <li class="nav-item">--}}
{{--          <a href="{{ route('partisans.index') }}" class="nav-link {{ activeLink('partisans*') }}">--}}
{{--            <i class="nav-icon fas fa-street-view"></i>--}}
{{--            {{ __('main.partisans') }}--}}
{{--          </a>--}}
{{--        </li>--}}
        <li class="nav-item">
          <a href="{{ route('regions.index') }}" class="nav-link {{ activeLink('regions*') }}">
            <i class="nav-icon fas fa-map-marked-alt"></i>
            <p>{{ __('main.regions') }}</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('degreelevels.index') }}" class="nav-link {{ activeLink('degreelevels*') }}">
            <i class="nav-icon fas fa-people-arrows"></i>
            <p>{{ __('main.degree_levels') }}</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('languages.index') }}" class="nav-link {{ activeLink('languages*') }}">
            <i class="nav-icon fas fa-globe"></i>
            <p>{{ __('main.language_system') }}</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('translations.index') }}" class="nav-link {{ activeLink('translations*') }}">
            <i class="nav-icon fas fa-language"></i>
            <p>{{ __('main.translations') }}</p>
          </a>
        </li>



        {{--        UNIVERSITY      --}}
        <li class="nav-header">{{ __('main.university') }}</li>
        <li class="nav-item">
          <a href="{{ route('chairs.index') }}" class="nav-link {{ activeLink('chairs*') }}">
            <i class="nav-icon fas fa-calendar-alt"></i>
            <p>{{ __('main.chairs') }}</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-school"></i>
            <p>{{ __('main.groups') }}</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-graduate"></i>
            <p>{{ __('main.students') }}</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chalkboard-teacher"></i>
            <p>{{ __('main.teachers') }}</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-newspaper"></i>
            <p>{{ __('main.edu_plain') }}</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>{{ __('main.sciences') }}</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-bar"></i>
            <p>{{ __('main.grades') }}</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-calendar"></i>
            <p>{{ __('main.edu_year') }}</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-question-circle"></i>
            <p>{{ __('main.surveys') }}</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book-open"></i>
            <p>{{ __('main.diplomas') }}</p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="javascript:void(false)" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              {{ __('main.exam') }}
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('intermediate.index') }}" class="nav-link {{ activeLink('intermediate*') }}">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>{{ __('main.intermediate') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('test.index') }}" class="nav-link {{ activeLink('test*') }}">
                <i class="nav-icon fas fa-feather-alt"></i>
                <p>{{ __('main.test') }}</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('speaking.index') }}" class="nav-link {{ activeLink('speaking*') }}">
                <i class="nav-icon fas fa-volume-up"></i>
                <p>{{ __('main.speaking') }}</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{ route('sync.index') }}" class="nav-link {{ activeLink('sync*') }}">
            <i class="nav-icon fas fa-sync-alt"></i>
            <p>{{ __('main.sync_lessons') }}</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('files.index') }}" class="nav-link {{ activeLink('files*') }}">
            <i class="nav-icon fas fa-folder-open"></i>
            <p>{{ __('main.file_management') }}</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
