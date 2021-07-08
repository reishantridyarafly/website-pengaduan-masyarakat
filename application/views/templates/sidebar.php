<div class="main-sidebar">
     <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
               <a href="<?= base_url('dashboard') ?>">Pengaduan Masyarakat</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
               <a href="<?= base_url('dashboard') ?>">PM</a>
          </div>
          <ul class="sidebar-menu">
               <?php if ($this->session->userdata('akses') == 'petugas') { ?>
                    <li class="menu-header">Dashboard</li>
                    <li class="<?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>">
                         <a class="nav-link" href="<?= base_url('dashboard') ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
                    </li>
               <?php } ?>
               <li class="menu-header">Navigation</li>
               <?php if ($this->session->userdata('level') == 'admin') { ?>
                    <li class="<?= $this->uri->segment(1) == 'petugas' ? 'active' : '' ?>">
                         <a class="nav-link" href="<?= base_url('petugas') ?>"><i class="fas fa-user-cog"></i> <span>Petugas</span></a>
                    </li>
               <?php } ?>
               <?php if ($this->session->userdata('akses') == 'petugas') { ?>
                    <li class="<?= $this->uri->segment(1) == 'masyarakat' ? 'active' : '' ?>">
                         <a class="nav-link" href="<?= base_url('masyarakat') ?>"><i class="fas fa-users"></i> <span>Masyarakat</span></a>
                    </li>
               <?php } ?>
               <li class="<?= $this->uri->segment(1) == 'profile' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('profile') ?>"><i class="fas fa-id-card"></i> <span>Profile</span></a>
               </li>
               <li class="<?= $this->uri->segment(1) == 'tanggapan' ? 'active' : '' ?>">
                    <a class="nav-link" href="<?= base_url('tanggapan') ?>"><i class="fas fa-volume-up"></i> <span>Pengaduan</span></a>
               </li>
               <?php if ($this->session->userdata('level') == 'admin') { ?>
                    <li class="nav-item dropdown <?= $this->uri->segment(1) == 'laporan' ? 'active' : '' ?>">
                         <a href="<?= base_url('laporan') ?>" class="nav-link has-dropdown"><i class="fas fa-file-alt"></i> <span>Laporan</span></a>
                         <ul class="dropdown-menu">
                              <li class="<?= $this->uri->segment(2) == 'tanggal' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('laporan/tanggal') ?>">Tanggal</a></li>
                              <li class="<?= $this->uri->segment(2) == 'bulan' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('laporan/bulan') ?>">Bulan</a></li>
                              <li class="<?= $this->uri->segment(2) == 'tahun' ? 'active' : '' ?>"><a class="nav-link" href="<?= base_url('laporan/tahun') ?>">Tahun</a></li>
                         </ul>
                    </li>
               <?php } ?>
               <li class="menu-header">Pengaturan</li>
               <li class="<?= $this->uri->segment(1) == 'ganti_password' ? 'active' : '' ?>">
                    <?php if ($this->session->userdata('akses') == 'masyarakat') { ?>
                         <a class="nav-link" href="<?= base_url('ganti_password/ganti_password_masyarakat') ?>"><i class="fas fa-cog"></i> <span>Ganti Password</span></a>
                    <?php } else { ?>
                         <a class="nav-link" href="<?= base_url('ganti_password') ?>"><i class="fas fa-cog"></i> <span>Ganti Password</span></a>
                    <?php } ?>
               </li>
               <li>
                    <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt"></i> <span>Keluar</span></a>
               </li>
          </ul>
     </aside>
</div>
<div class="main-wrapper">
     <div class="navbar-bg"></div>
     <nav class="navbar navbar-expand-lg main-navbar">
          <form class="form-inline mr-auto">
               <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
               </ul>
               <div class="d-sm-none d-lg-inline-block text-light"><?= longdate_indo('Y-m-d') ?></div>
          </form>
          <ul class="navbar-nav navbar-right">
               <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                         <div class="d-sm-none d-lg-inline-block">Hi, <?= $this->session->userdata('nama') ?></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                         <a href="<?= base_url('profile') ?>" class="dropdown-item has-icon">
                              <i class="far fa-user"></i> Profile
                         </a>
                         <a href="<?= $this->session->userdata('akses') == 'petugas' ? base_url('ganti_password') : base_url('ganti_password/ganti_password_masyarakat') ?>" class="dropdown-item has-icon">
                              <i class="fas fa-cog"></i> Ganti Password
                         </a>
                         <div class="dropdown-divider"></div>
                         <a href="" data-toggle="modal" data-target="#logoutModal" class="dropdown-item has-icon text-danger">
                              <i class="fas fa-sign-out-alt"></i> Keluar
                         </a>
                    </div>
               </li>
          </ul>
     </nav>