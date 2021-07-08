<div class="main-content">
     <section class="section">
          <div class="container">
               <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                         <!-- <div class="login-brand">
                                   <img src="<?= base_url() ?>/assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                              </div> -->

                         <div class="card card-primary">
                              <div class="card-header">
                                   <h4>Registrasi</h4>
                              </div>

                              <div class="card-body">
                                   <form action="<?= base_url('registrasi') ?>" method="post">
                                        <div class="form-group">
                                             <label for="nik">Nomor Induk Kependudukan</label>
                                             <input id="nik" type="number" class="form-control" name="nik" value="<?= set_value('nik') ?>">
                                             <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="row">
                                             <div class="form-group col-6">
                                                  <label for="nama" class="d-block">Nama</label>
                                                  <input id="nama" type="text" class="form-control" name="nama" value="<?= set_value('nama') ?>">
                                                  <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                             </div>
                                             <div class="form-group col-6">
                                                  <label for="username" class="d-block">Username</label>
                                                  <input id="username" type="text" class="form-control" name="username" value="<?= set_value('username') ?>">
                                                  <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                             </div>
                                        </div>

                                        <div class="form-group">
                                             <label for="email">Email</label> <small>(Biarkan kosong bila tidak di isi!)</small>
                                             <input id="email" type="email" class="form-control" name="email" value="<?= set_value('email') ?>">
                                             <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                             <label for="telp">No Telepon</label>
                                             <input id="telp" type="number" class="form-control" name="telp" value="<?= set_value('telp') ?>">
                                             <?= form_error('telp', '<small class="text-danger">', '</small>'); ?>
                                        </div>

                                        <div class="form-group">
                                             <button type="submit" class="btn btn-primary btn-lg btn-block">
                                                  Registrasi
                                             </button>
                                        </div>

                                        <div class="text-center">
                                             <a href="<?= base_url(); ?>auth">Sudah memiliki akun? Login!</a>
                                        </div>
                                   </form>
                              </div>
                         </div>
                         <div class="simple-footer">
                              Copyright &copy; Reishan Tridya Rafly <?= date('Y') ?>
                         </div>
                    </div>
               </div>
          </div>
     </section>
</div>