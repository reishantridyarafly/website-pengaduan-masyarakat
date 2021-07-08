<!-- Main Content -->
<div class="main-content">
     <section class="section">
          <div class="section-header">
               <h1><?= $judul ?></h1>
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
                                                       <th>NIK</th>
                                                       <th>Nama</th>
                                                       <th>No Telepon</th>
                                                       <th width="15%">Foto</th>
                                                       <th width="10%">Status</th>
                                                       <th width="15%">Aksi</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <?php
                                                  $no = 1;
                                                  foreach ($masyarakat as $m) { ?>
                                                       <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><?= $m->nik ?></td>
                                                            <td><?= $m->nama ?></td>
                                                            <td><?= $m->telp ?></td>
                                                            <td class="text-center">
                                                                 <img src="<?= base_url() . 'gambar/profile/' . $m->foto ?>" style="border-radius: 5%;" width="100%">
                                                            </td>
                                                            <td class="text-center">
                                                                 <?= $m->status_masyarakat == '1' ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Banned</span>' ?>
                                                            </td>
                                                            <td>
                                                                 <a href="<?= base_url('masyarakat/masyarakat_edit/' . $m->username) ?>" class="btn btn-warning btn-sm mr-1" title="Edit Data">
                                                                      <i class="fas fa-edit"></i>
                                                                 </a>
                                                                 <a href="" data-toggle="modal" data-target="#hapusModal<?= $m->username ?>" class="btn btn-danger btn-sm" title="Hapus Data">
                                                                      <i class=" fas fa-trash"></i>
                                                                 </a>
                                                            </td>
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
foreach ($masyarakat as $m) { ?>
     <div class="modal fade" id="hapusModal<?= $m->username ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Hapus Masyarakat</h5>
                         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                         </button>
                    </div>
                    <div class="modal-body">Apakah anda yakin ingin menghapus <strong><?= $m->nama ?></strong>?</div>
                    <div class="modal-footer">
                         <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                         <a class="btn btn-danger" href="<?= base_url('masyarakat/masyarakat_hapus/' . $m->username) ?>">Hapus</a>
                    </div>
               </div>
          </div>
     </div>
<?php } ?>