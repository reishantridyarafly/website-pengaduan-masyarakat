<!-- Main Content -->
<div class="main-content">
     <section class="section">
          <div class="section-header">
               <h1><?= $judul ?></h1>
               <div class="section-header-button">
                    <?php if ($this->session->userdata('akses') == 'masyarakat') { ?>
                         <a href="<?= base_url('tanggapan/pengaduan_tambah/') ?>" class="btn btn-primary">Tambah <?= $judul ?></a>
                    <?php } ?>
               </div>
               <div class="section-header-breadcrumb">
                    <?php if ($this->session->userdata('level') == 'admin') { ?>
                         <div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
                    <?php } ?>
                    <div class="breadcrumb-item"><?= $judul ?></div>
               </div>
          </div>
          <?= $this->session->flashdata('message'); ?>

          <div class="row">
               <?php foreach ($tanggapan as $t) { ?>
                    <?php if ($this->session->userdata('akses') == 'masyarakat') { ?>
                         <?php if ($this->session->userdata('nik') == $t->nik) { ?>
                              <div class="col-12 col-md-4 col-lg-4">
                                   <article class="article article-style-c">
                                        <div class="article-header">
                                             <div class="article-image" data-background="<?= base_url() . 'gambar/pengaduan/' . $t->foto_pengaduan ?>">
                                             </div>
                                        </div>
                                        <div class="article-details">
                                             <div class="article-category"><a href="#"><?= longdate_indo($t->tgl_pengaduan) ?></a></div>
                                             <div class="article-title">
                                                  <h2><a href="#"><?= $t->nama ?></a></h2>
                                             </div>
                                             <p><?= limit_words($t->isi_laporan, 20) . '...'; ?></p>
                                             <div class="article-cta mb-3">
                                                  <?php if ($t->status == '0') {
                                                       echo '<span class="badge badge-danger">Belum Di Proses</span>';
                                                  } elseif ($t->status == 'proses') {
                                                       echo '<span class="badge badge-warning">Sedang Di Proses</span>';
                                                  } elseif ($t->status == 'selesai') {
                                                       echo '<span class="badge badge-success">Selesai Di Proses</span>';
                                                  } elseif ($t->status == 'ditolak') {
                                                       echo '<span class="badge badge-dark">Pengaduan Di Tolak!</span>';
                                                  } ?>
                                             </div>
                                             <div class="text-center">
                                                  <?php if ($t->status == '0') { ?>
                                                       <a data-toggle="modal" data-target="#verifikasiModal" href="" class=" btn btn-sm btn-info" title="Belum Di Proses"><i class="fas fa-eye"></i> Lihat Tanggapan</a>
                                                  <?php } elseif ($t->status == 'proses') { ?>
                                                       <a href="<?= base_url('tanggapan/tanggapan_proses/' . $t->id_pengaduan) ?>" class="btn btn-sm btn-info" title="Sedang Proses"><i class="fas fa-eye"></i> Lihat Tanggapan</a>
                                                  <?php } elseif ($t->status == 'selesai') { ?>
                                                       <a href="<?= base_url('tanggapan/tanggapan_selesai/' . $t->id_pengaduan) ?>" class="btn btn-sm btn-info" title="Selesai Di Proses"><i class="fas fa-eye"></i> Lihat Tanggapan</a>
                                                  <?php } elseif ($t->status == 'ditolak') { ?>
                                                       <a data-toggle="modal" data-target="#ditolakModal" href="" class="btn btn-sm btn-info" title="Pengaduan Di Tolak"><i class="fas fa-eye"></i> Lihat Tanggapan</a>
                                                  <?php } ?>
                                             </div>
                                        </div>
                                   </article>
                              </div>
                         <?php } ?>

                    <?php } elseif ($this->session->userdata('akses') == 'petugas') { ?>
                         <div class="col-12 col-md-4 col-lg-4">
                              <article class="article article-style-c">
                                   <div class="article-header">
                                        <div class="article-image" data-background="<?= base_url() . 'gambar/pengaduan/' . $t->foto_pengaduan ?>">
                                        </div>
                                   </div>
                                   <div class="article-details">
                                        <div class="article-category"><a href="#"><?= longdate_indo($t->tgl_pengaduan) ?></a></div>
                                        <div class="article-title">
                                             <h2><a href="#"><?= $t->nama ?></a></h2>
                                        </div>
                                        <p><?= limit_words($t->isi_laporan, 20) . '...'; ?></p>
                                        <div class="article-cta mb-2">
                                             <?php if ($t->status == '0') {
                                                  echo '<span class="badge badge-danger">Belum Di Proses</span>';
                                             } elseif ($t->status == 'proses') {
                                                  echo '<span class="badge badge-warning">Sedang Di Proses</span>';
                                             } elseif ($t->status == 'selesai') {
                                                  echo '<span class="badge badge-success">Selesai Di Proses</span>';
                                             } elseif ($t->status == 'ditolak') {
                                                  echo '<span class="badge badge-dark">Pengaduan Di Tolak!</span>';
                                             } ?>
                                        </div>
                                        <div class="article-cta">
                                             <?php if ($t->status == 'proses' || $t->status == 'selesai') { ?>
                                                  <a href="<?= base_url('tanggapan/tanggapan_proses/' . $t->id_pengaduan) ?>" class="btn btn-sm btn-warning" title="Belum Di Proses"><i class="fas fa-history"></i> Proses</a>
                                                  <a href="<?= base_url('tanggapan/tanggapan_selesai/' . $t->id_pengaduan) ?>" class="btn btn-sm btn-success ml-1" title="Selesai Di Proses"><i class="fas fa-check-circle"></i> Selesai</a>
                                                  <a href="" data-toggle="modal" data-target="#hapusModal<?= $t->id_pengaduan ?>" class="btn btn-sm btn-danger ml-1" title="Hapus Pengaduan"><i class="fas fa-trash"></i> Hapus</a>
                                             <?php } elseif ($t->status == 'ditolak') { ?>
                                                  <a href="" data-toggle="modal" data-target="#hapusModal<?= $t->id_pengaduan ?>" class="btn btn-sm btn-danger ml-1" title="Hapus Pengaduan"><i class="fas fa-trash"></i> Hapus</a>
                                             <?php } else { ?>
                                                  <a href="<?= base_url('tanggapan/tanggapan_proses/' . $t->id_pengaduan) ?>" class="btn btn-sm btn-warning" title="Belum Di Proses"><i class="fas fa-history"></i> Proses</a>
                                                  <a href="<?= base_url('tanggapan/tanggapan_selesai/' . $t->id_pengaduan) ?>" class="btn btn-sm btn-success ml-1" title="Selesai Di Proses"><i class="fas fa-check-circle"></i> Selesai</a>
                                                  <a href="" data-toggle="modal" data-target="#hapusModal<?= $t->id_pengaduan ?>" class="btn btn-sm btn-danger ml-1" title="Hapus Pengaduan"><i class="fas fa-trash"></i> Hapus</a>
                                                  <a href="" data-toggle="modal" data-target="#tolakModal<?= $t->id_pengaduan ?>" class="btn btn-sm btn-dark ml-1" title="Pengaduan Di Tolak"><i class=" fas fa-ban"></i> Tolak</a>
                                             <?php } ?>
                                        </div>
                                   </div>
                              </article>
                         </div>
                    <?php } ?>
               <?php } ?>
          </div>
          <?php echo $this->pagination->create_links(); ?>
     </section>
</div>

<!-- Hapus Modal-->
<?php
foreach ($tanggapan as $t) { ?>
     <div class="modal fade" id="hapusModal<?= $t->id_pengaduan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Hapus Pengaduan</h5>
                         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                         </button>
                    </div>
                    <div class="modal-body">Apakah anda yakin ingin menghapus pengaduan <strong><?= $t->nama ?></strong>?</div>
                    <div class="modal-footer">
                         <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                         <a class="btn btn-danger" href="<?= base_url('tanggapan/tanggapan_hapus/' . $t->id_pengaduan) ?>">Hapus</a>
                    </div>
               </div>
          </div>
     </div>
<?php } ?>

<!-- tolak Modal-->
<?php
foreach ($tanggapan as $t) { ?>
     <div class="modal fade" id="tolakModal<?= $t->id_pengaduan ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Tolak Pengaduan</h5>
                         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                         </button>
                    </div>
                    <div class="modal-body">Apakah anda yakin ingin menolak pengaduan <strong><?= $t->nama ?></strong>?</div>
                    <div class="modal-footer">
                         <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                         <a class="btn btn-danger" href="<?= base_url('tanggapan/tanggapan_ditolak/' . $t->id_pengaduan) ?>">Tolak</a>
                    </div>
               </div>
          </div>
     </div>
<?php } ?>

<!-- Verifikasi Modal-->
<div class="modal fade" id="verifikasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pengaduan Masyarakat</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">×</span>
                    </button>
               </div>
               <div class="modal-body">Pengaduan anda sedang di verifikasi !</div>
               <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
               </div>
          </div>
     </div>
</div>

<!-- ditolak Modal-->
<div class="modal fade" id="ditolakModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pengaduan Masyarakat</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">×</span>
                    </button>
               </div>
               <div class="modal-body">Pengaduan anda ditolak !</div>
               <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
               </div>
          </div>
     </div>
</div>