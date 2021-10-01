<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion <?= $this->uri->segment(2) == 'transaksi' ? 'navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled' : null ?>" id=" accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/index'); ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-dolly-flatbed"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Inventory</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Dashboard
    </div>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/index'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Kasir
    </div>

    <!-- Nav Item - Transaksi -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/transaksi'); ?>">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Transaksi</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Master
    </div>

    <!-- <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/barangMasuk'); ?>">
            <i class="fas fa-fw fa-truck-loading"></i>
            <span>Barang Masuk</span></a>
    </li> -->

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/barang'); ?>">
            <i class="fas fa-fw fa-boxes"></i>
            <span>Data Barang</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/supplier'); ?>">
            <i class="fas fa-fw fa-parachute-box"></i>
            <span>Data Supplier</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Stok Barang
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/barangMasukAll'); ?>">
            <i class="fas fa-fw fa-truck-loading"></i>
            <span>Barang Masuk</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/barangKeluarAll'); ?>">
            <i class="fas fa-fw fa-box-open"></i>
            <span>Barang Keluar</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Heading -->
    <div class="sidebar-heading">
        User
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/profile'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Profil Admin</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/editProfile'); ?>">
            <i class="fas fa-fw fa-user-edit"></i>
            <span>Edit Profil</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->