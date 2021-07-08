<!-- Main Content -->
<div class="main-content">
     <section class="section">
          <div class="section-header">
               <h1><?= $judul ?></h1>
               <div class="section-header-button">
                    <?php if ($this->session->userdata('level') == 'admin') { ?>
                         <a href="<?= base_url('petugas/petugas_tambah') ?>" class="btn btn-primary">Tambah <?= $judul ?></a>
                    <?php } ?>
               </div>
               <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
                    <div class="breadcrumb-item"><?= $judul ?></div>
               </div>
          </div>
          <?= $this->session->flashdata('message'); ?>
          <div class="section-body">
               <div class="row mt-4">
                    <div class="col-12">
                         <div class="card">
                              <div class="card-header">
                                   <h4>Semua <?= $judul ?></h4>
                              </div>
                              <div class="card-body">

                                   <div class="clearfix mb-3"></div>

                                   <div class="table-responsive">
                                        <table class="table table-striped" id="dataTable">
                                             <thead>
                                                  <tr>
                                                       <th>No</th>
                                                       <th>Nama</th>
                                                       <th>No Telepon</th>
                                                       <th>level</th>
                                                       <th width="15%">Foto</th>
                                                       <th width="10%">Status</th>
                                                       <th width="15%">Aksi</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <?php
                                                  $no = 1;
                                                  foreach ($petugas as $p) { ?>
                                                       <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $p->nama_petugas ?></td>
                                                            <td><?= $p->telp ?></td>
                                                            <td class="text-center">
                                                                 <?= $p->level == 'admin' ? '<span class="badge badge-info">Admin</span>' : '<span class="badge badge-info">Petugas</span>' ?>
                                                            </td>
                                                            <td class="text-center">
                                                                 <img src="<?= base_url() . 'gambar/profile/' . $p->foto ?>" style="border-radius: 5%;" width="100%">
                                                            </td>
                                                            <td class="text-center">
                                                                 <?= $p->status == '1' ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Banned</span>' ?>
                                                            </td>
                                                            <?php if ($this->session->userdata('level') == 'admin') { ?>
                                                                 <?php if ($this->session->userdata('id_petugas') != $p->id_petugas) { ?>
                                                                      <td>
                                                                           <a href="<?= base_url('petugas/petugas_edit/' . $p->id_petugas) ?>" class="btn btn-warning btn-sm mr-1" title="Edit Data">
                                                                                <i class="fas fa-edit"></i>
                                                                           </a>
                                                                           <a href="" data-toggle="modal" data-target="#hapusModal<?= $p->id_petugas ?>" class="btn btn-danger btn-sm" title="Hapus Data">
                                                                                <i class="fas fa-trash"></i>
                                                                           </a>
                                                                      </td>
                                                                 <?php } else { ?>
                                                                      <td>
                                                                           <h6>Tidak ada aksi!</h6>
                                                                      </td>
                                                                 <?php } ?>
                                                            <?php } else { ?>
                                                                 <td>
                                                                      <h6>Tidak ada aksi!</h6>
                                                                 </td>
                                                            <?php } ?>
                                                       </tr>
                                                  <?php } ?>
                                             </tbody>
                                        </table>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
     </section>
</div>

<!-- Hapus Modal-->
<?php
foreach ($petugas as $p) { ?>
     <div class="modal fade" id="hapusModal<?= $p->id_petugas ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Hapus Petugas</h5>
                         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                         </button>
                    </div>
                    <div class="modal-body">Apakah anda yakin ingin menghapus <strong><?= $p->nama_petugas ?></strong>?</div>
                    <div class="modal-footer">
                         <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                         <a class="btn btn-danger" href="<?= base_url('petugas/petugas_hapus/' . $p->id_petugas) ?>">Hapus</a>
                    </div>
               </div>
          </div>
     </div>
<?php } ?>