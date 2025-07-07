<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-graduation-cap"></i>
    </div>
    <div class="sidebar-brand-text mx-3">ADMIN</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('mahasiswa') }}">
      <i class="fas fa-user-graduate"></i>
      <span>Mahasiswa</span>
    </a>
  </li>

  <!-- Sidebar - Daftar Beasiswa -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBeasiswa" aria-expanded="true" aria-controls="collapseBeasiswa">
        <i class="fas fa-graduation-cap"></i>
        <span>Daftar Beasiswa</span>
    </a>
    <div id="collapseBeasiswa" class="collapse" aria-labelledby="headingBeasiswa" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{ route('beasiswa') }}">Beasiswa</a>
            @if (auth()->user()->level == 'Admin')
                <a class="collapse-item" href="{{ route('kategori') }}">Kategori</a>
            @endif
        </div>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('pendaftaran') }}">
      <i class="fas fa-clipboard-list"></i>
      <span>Pendaftaran Umum</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.pendaftaran.talent_seni.index') }}">
      <i class="fas fa-music"></i>
      <span>Pendaftaran Talent Seni</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.pendaftaran_cendekia.index') }}">
      <i class="fas fa-book"></i>
      <span>Pendaftaran Cendekia</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
