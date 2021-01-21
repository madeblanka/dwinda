<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
  </nav>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url('admin/dist/img/AdminLTELogo.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Selamat Datang</span>
    </a>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Main Menu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('transaksi/index')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Table Transaksi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('user/index')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Table User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('kategori/penjualan')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Table Penjualan</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="<?php echo site_url('barang/index')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Table Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('kategori/index')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Table Kategori</p>
                </a>
              </li>
              <?php if($this->session->userdata('role') !="pegawai"): ?>
              <li class="nav-item">
                <a href="<?php echo site_url('transaksi/grafiktransaksi')?>" class="nav-link">
                  <i class="fas fa-chart-bar nav-icon"></i>
                  <p>Grafik Transaksi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('transaksi/grafiklaba')?>" class="nav-link">
                  <i class="fas fa-chart-bar nav-icon"></i>
                  <p>Grafik Laba</p>
                </a>
              </li>
              <?php endif ?>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Print Data
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo site_url('prints/printbarang')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Print Data Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo site_url('prints/printuser')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Print Data User</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
                <a href="<?php echo site_url('login/logout')?>" class="nav-link">
                  <i class="fas fa-sign-out-alt"></i>
                  <p>Logout</p>
                </a>
              </li>
        </ul>
      </nav>
  </aside>
</div>
