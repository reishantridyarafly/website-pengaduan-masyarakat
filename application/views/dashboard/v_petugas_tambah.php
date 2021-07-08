<!-- Main Content -->
<div class="main-content">
     <section class="section">
          <div class="section-header">
               <div class="section-header-back">
                    <a href="<?= base_url('petugas') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
               </div>
               <h1><?= $judul ?></h1>
               <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="<?= base_url('petugas') ?>">Petugas</a></div>
                    <div class="breadcrumb-item"><?= $judul ?></div>
               </div>
          </div>

          <div class="section-body">
               <div class="row">
                    <div class="col-12">
                         <div class="card">
                              <?= form_open_multipart('petugas/petugas_aksi') ?>
                              <div class="card-body">
                                   <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="nama">Nama Lengkap</label>
                                        <div class="col-sm-12 col-md-7">
                                             <input type="text" class="form-control" name="nama" id="nama" value="<?= set_value('nama') ?>">
                                             <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                   </div>
                                   <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="username">Username</label>
                                        <div class="col-sm-12 col-md-7">
                                             <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username') ?>">
                                             <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                   </div>
                                   <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="email">Email</label>
                                        <div class="col-sm-12 col-md-7">
                                             <input type="email" class="form-control" name="email" id="email" value="<?= set_value('email') ?>">
                                             <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                   </div>
                                   <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="password">Password</label>
                                        <div class="col-sm-12 col-md-7">
                                             <input type="password" class="form-control" name="password" id="password" value="<?= set_value('password') ?>">
                                             <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                   </div>
                                   <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="password2">Konfirmasi Password</label>
                                        <div class="col-sm-12 col-md-7">
                                             <input type="password" class="form-control" name="password2" id="password2" value="<?= set_value('password2') ?>">
                                             <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                   </div>
                                   <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="telp">No Telepon</label>
                                        <div class="col-sm-12 col-md-7">
                                             <input type="number" class="form-control" name="telp" id="telp" value="<?= set_value('telp') ?>">
                                        </div>
                                   </div>
                                   <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="level">Level</label>
                                        <div class="col-sm-12 col-md-7">
                                             <select name="level" id="level" class="form-control">
                                                  <option value="">--Pilih Level--</option>
                                                  <option value="admin">Admin</option>
                                                  <option value="petugas">Petugas</option>
                                             </select>
                                        </div>
                                   </div>

                                   <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="foto">Foto</label>
                                        <div class="col-sm-12 col-md-7">
                                             <input type="file" class="form-control" name="foto" id="foto" value="<?= set_value('foto') ?>">
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