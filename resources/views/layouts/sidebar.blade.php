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
        @can('permissions.read')
        <li class="nav-item">
          <a href="{{ route('permissions.index') }}" class="nav-link {{ activeLink('permissions.*') }}">
            <i class="nav-icon fas fa-user-check"></i>
            <p>
              <span>Huquqlar</span>
            </p>
          </a>
        </li>
        @endcan
        <li class="nav-item">
          <a href="{{ route('users.index') }}" class="nav-link {{ activeLink('users.*') }}">
            <i class="nav-icon fas fa-users"></i>
            Foydalanuvchilar
          </a>
        </li>
        <li class="nav-header">Universitet</li>
        <li class="nav-item">
          <a href="{{ route('admissions') }}" class="nav-link {{ activeLink('admissions.*') }}">
            <i class="nav-icon fas fa-calendar-alt"></i>
            O'quv yili
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('divisions.index') }}" class="nav-link {{ activeLink('divisions.*') }}">
            <i class="nav-icon fas fa-school"></i>
            <p>
              <span>Kafedra</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('sciences.index') }}" class="nav-link {{ activeLink('sciences.*') }}">
            <i class="nav-icon fas fa-book-open"></i>
            <p>
              <span>Fanlar</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('class_schedule.index') }}" class="nav-link {{ activeLink('class_schedule.*') }}">
            <i class="nav-icon fas fa-clipboard-list"></i>
            <p>
              <span>Dars jadvali</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('professors.index') }}" class="nav-link {{ activeLink('professors.*') }}">
            <i class="nav-icon fas fa-user-tie"></i>
            <p>
              <span>Professor-o'qituvchilar</span>
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
