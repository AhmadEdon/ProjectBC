<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon">
      <img src="assets/img/login/bc-bgr.png" width="60" height="60" alt="">
    </div>
    <div class="sidebar-brand-text mx-3">SiAngklung</div>
  </a>

  <!-- Heading -->
  <div class="sidebar-heading ">
    <i class="fas fa-fw fa-users-cog"></i>
    Admin
  </div>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('user'); ?>">
      <i class="fas fa-fw fa-home"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Nav Item - Ceisa -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('ceisa'); ?>">
      <i class="fas fa-fw fa-folder"></i>
      <span>Ceisa</span></a>
  </li>

  <!-- Nav Item - It Inventory -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('it_inventory'); ?>">
      <i class="fas fa-fw fa-folder-open"></i>
      <span>It Inventory</span></a>
  </li>

  <!-- Nav Item - Logout -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
      <i class="fas fa-fw fa-sign-out-alt"></i>
      <span>Logout</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->