<?php $user_profile = $this->session->userdata('cek_login') ?>
<?php if($user_profile->level != "owner"): ?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?=base_url('admin')?>">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3">Laundry <sup>2</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="index.html">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Utama
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-cog"></i>
    <span>Transaksi</span>
  </a>
  
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Utama</h6>
      
      <a class="collapse-item" href="<?=base_url('admin/transaksi')?>">Transaksi</a>
      <a class="collapse-item" href="<?=base_url('admin/pelanggan')?>">Pelanggan</a>
      <?php if($user_profile->level != "kasir"): ?>
      <a class="collapse-item" href="<?=base_url('admin/paket')?>">Paket</a>
      <?php endif;?>
    </div>
  </div>
</li>

<?php if($user_profile->level != "kasir"): ?>
<!-- Nav Item - Charts -->
<li class="nav-item">
  <a class="nav-link" href="<?=base_url('admin/pengguna')?>">
    <i class="fas fa-fw fa-chart-area"></i>
    <span>Pengguna</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
  <a class="nav-link" href="<?=base_url('admin/outlet')?>">
    <i class="fas fa-fw fa-table"></i>
    <span>Outlet</span></a>
</li>
<?php endif;?>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
<?php endif;?>