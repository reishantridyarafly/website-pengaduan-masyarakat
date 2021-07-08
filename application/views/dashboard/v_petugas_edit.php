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
                              <?= form_open_multipart('petugas/petugas_update') ?>
                              <?php foreach ($petugas as $p) { ?>
                                   <div class="card-body">
                                        <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="nama">Nama Lengkap</label>
                                             <input type="hidden" name="id" id="id" value="<?= $p->id_petugas ?>">
                                             <div class="col-sm-12 col-md-7">
                                                  <input type="text" class="form-control" name="nama" id="nama" value="<?= $p->nama_petugas ?>">
                                                  <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                             </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="username">Username</label>
                                             <div class="col-sm-12 col-md-7">
                                                  <input type="text" class="form-control" name="username" id="username" value="<?= $p->username ?>">
                                                  <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                             </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="email">Email</label>
                                             <div class="col-sm-12 col-md-7">
                                                  <input type="text" class="form-control" name="email" id="email" value="<?= $p->email_petugas ?>">
                                                  <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                             </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="telp">No Telepon</label>
                                             <div class="col-sm-12 col-md-7">
                                                  <input type="number" class="form-control" name="telp" id="telp" value="<?= $p->telp ?>">
                                             </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="level">Level</label>
                                             <div class="col-sm-12 col-md-7">
                                                  <select name="level" id="level" class="form-control">
                                                       <option value="admin" <?= $p->level == 'admin' ? 'selected' : '' ?>>Admin</option>
                                                       <option value="petugas" <?= $p->level == 'petugas' ? 'selected' : '' ?>>Petugas</option>
                                                  </select>
                                             </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="foto">Foto</label>
                                             <div class="col-sm-12 col-md-7">
                                                  <img src="<?= base_url() . 'gambar/profile/' . $p->foto ?>" width="30%" style="border-radius: 5%;">
                                                  <input type="file" class="form-control" name="foto" id="foto" value="<?= set_value('foto') ?>">
                                             </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="status">Status</label>
                                             <div class="col-sm-12 col-md-7">
                                                  <select name="status" id="status" class="form-control">
                                                       <option value="1" <?= $p->status == '1' ? 'selected' : '' ?>>Aktif</option>
                                                       <option value="0" <?= $p->status == '0' ? 'selected' : '' ?>>Banned</option>
                                                  </select>
                                             </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                             <div class="col-sm-12 col-md-7">
                                                  <button class="btn btn-primary float-right" type="submit">Submit</button>
                                             </div>
                                        </div>
                                   </div>
                              <?php } ?>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
     </section>
</div>