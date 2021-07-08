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
          <?= $this->session->flashdata('message') ?>
          <div class="section-body">
               <div class="row">
                    <div class="col-12">
                         <div class="card">
                              <form action="<?= base_url('ganti_password') ?>" method="post">
                                   <div class="card-body">
                                        <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="password_lama">Password Lama</label>
                                             <div class="col-sm-12 col-md-7">
                                                  <input type="password" class="form-control" name="password_lama" id="password_lama" value="<?= set_value('password_lama') ?>">
                                                  <?= form_error('password_lama', '<small class="text-danger">', '</small>'); ?>
                                             </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="password_baru">Password Baru</label>
                                             <div class="col-sm-12 col-md-7">
                                                  <input type="password" class="form-control" name="password_baru" id="password_baru" value="<?= set_value('password_baru') ?>">
                                                  <?= form_error('password_baru', '<small class="text-danger">', '</small>'); ?>
                                             </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="konfirmasi_password">Konfirmasi password</label>
                                             <div class="col-sm-12 col-md-7">
                                                  <input type="password" class="form-control" name="konfirmasi_password" id="konfirmasi_password" value="<?= set_value('konfirmasi_password') ?>">
                                                  <?= form_error('konfirmasi_password', '<small class="text-danger">', '</small>'); ?>
                                             </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                             <div class="col-sm-12 col-md-7">
                                                  <button class="btn btn-primary float-right" type="submit">Submit</button>
                                             </div>
                                        </div>
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
     </section>
</div>