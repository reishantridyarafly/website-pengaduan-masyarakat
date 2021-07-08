<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
     <title><?= $judul ?></title>

     <!-- General CSS Files -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

     <!-- CSS Libraries -->

     <!-- Template CSS -->
     <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
     <link rel="stylesheet" href="<?= base_url() ?>assets/css/components.css">
</head>

<body class="layout-3">
     <div id="app">
          <div class="main-wrapper container">
               <div class="navbar-bg"></div>
               <nav class="navbar navbar-expand-lg main-navbar">
                    <a href="index.html" class="navbar-brand sidebar-gone-hide"><?= $judul ?></a>
                    <div class="navbar-nav">
                         <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
                    </div>
               </nav>

               <nav class="navbar navbar-secondary navbar-expand-lg">
                    <div class="container">
                         <ul class="navbar-nav">
                              <li class="nav-item <?= $this->uri->segment(1) == 'pengaduan' || $this->uri->segment(1) == ''  ? 'active' : '' ?>">
                                   <a href="<?= base_url('pengaduan') ?>" class="nav-link"><i class="fas fa-volume-up"></i><span>Pengaduan</span></a>
                              </li>
                              <li class="nav-item <?= $this->uri->segment(1) == 'auth' ? 'active' : '' ?>">
                                   <a href="<?= base_url('auth') ?>" class="nav-link"><i class="fas fa-sign-in-alt"></i><span>Login</span></a>
                              </li>
                              <li class="nav-item <?= $this->uri->segment(1) == 'registrasi' ? 'active' : '' ?>">
                                   <a href="<?= base_url('registrasi') ?>" class="nav-link"><i class="fas fa-list"></i><span>Registrasi</span></a>
                              </li>
                         </ul>
                    </div>
               </nav>