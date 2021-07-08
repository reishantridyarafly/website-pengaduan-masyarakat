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

<body>
     <div id="app">
          <section class="section">
               <div class="container mt-5">
                    <div class="page-error">
                         <div class="page-inner">
                              <h2><?= $judul ?></h2>
                              <div class="page-description">
                                   <?= $subjudul ?>
                              </div>
                              <div class="card mt-4">
                                   <div class="card-body">
                                        <table class="table table-bordered">
                                             <thead class="thead-dark">
                                                  <tr>
                                                       <th scope="col">#</th>
                                                       <th scope="col">Nama</th>
                                                       <th scope="col">Tanggal Pengaduan</th>
                                                       <th scope="col" width="25%">Foto Pengaduan</th>
                                                       <th scope="col">Status</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <?php
                                                  $no = 1;
                                                  foreach ($filter as $f) { ?>
                                                       <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $f->nama ?></td>
                                                            <td><?= longdate_indo($f->tgl_pengaduan) ?></td>
                                                            <td>
                                                                 <img src="<?= base_url() . 'gambar/pengaduan/' . $f->foto_pengaduan ?>" class="m-3" width="100%">
                                                            </td>
                                                            <td>
                                                                 <?php if ($f->status == '0') {
                                                                      echo 'Belum Di Proses';
                                                                 } elseif ($f->status == 'proses') {
                                                                      echo 'Sedang Di Proses';
                                                                 } elseif ($f->status == 'selesai') {
                                                                      echo 'Selesai';
                                                                 } elseif ($f->status == 'ditolak') {
                                                                      echo 'Pengaduan ditolak';
                                                                 } ?>
                                                            </td>
                                                       </tr>
                                                  <?php } ?>
                                             </tbody>
                                        </table>
                                   </div>
                              </div>
                         </div>
                    </div>
          </section>
     </div>

     <script type="text/javascript">
          window.print();
     </script>
     <!-- General JS Scripts -->
     <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
     <script src="../assets/js/stisla.js"></script>

     <!-- JS Libraies -->

     <!-- Template JS File -->
     <script src="../assets/js/scripts.js"></script>
     <script src="../assets/js/custom.js"></script>

     <!-- Page Specific JS File -->
</body>

</html>