<!-- Main Content -->
<div class="main-content">
     <section class="section">
          <div class="section-header">
               <h1><?= $judul ?></h1>
               <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><?= $judul ?></div>
               </div>
          </div>
          <?= $this->session->flashdata('message') ?>
          <div class="section-body">
               <div class="row">
                    <div class="col-12">
                         <div class="card">
                              <form action="<?= base_url('ganti_password/ganti_password_masyarakat') ?>" method="post">
                                   <div class="card-body">
                                        <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="password_lama">Password Lama</label>
                                             <div class="col-sm-12 col-md-7">
                                                  <input type="password" class="form-control" name="password_lama" id="password_lama" value="<?= set_value('password_lama') ?>">
                                                  <?= form_error('password_lama', '<small class="text-danger">', '</small>'); ?>
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