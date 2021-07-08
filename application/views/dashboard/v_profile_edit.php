<!-- Main Content -->
<div class="main-content">
     <section class="section">
          <div class="section-header">
               <div class="section-header-back">
                    <a href="<?= base_url('profile') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
               </div>
               <h1><?= $judul ?></h1>
               <div class="section-header-breadcrumb">
                    <?php if ($this->session->userdata('akses') == 'petugas') { ?>
                         <div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
                    <?php } ?>
                    <div class="breadcrumb-item"><a href="<?= base_url('profile') ?>">Profile</a></div>
                    <div class="breadcrumb-item"><?= $judul ?></div>
               </div>
          </div>

          <div class="section-body">
               <div class="row">
                    <div class="col-12">
                         <div class="card">
                              <?= form_open_multipart('profile/profile_update') ?>
                              <?php foreach ($user as $s) { ?>
                                   <div class="card-body">
                                        <?php if ($this->session->userdata('akses') == 'masyarakat') { ?>
                                             <div class="form-group row mb-4">
                                                  <input type="hidden" name="username" id="username" value="<?= $s->username ?>">
                                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="nik">Nomor Induk Kependudukan (NIK)</label>
                                                  <div class="col-sm-12 col-md-7">
                                                       <input type="text" class="form-control" name="nik" id="nik" value="<?= $s->nik ?>" disabled>
                                                  </div>
                                             </div>
                                             <div class="form-group row mb-4">
                                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="nama">Nama</label>
                                                  <div class="col-sm-12 col-md-7">
                                                       <input type="text" class="form-control" name="nama" id="nama" value="<?= $s->nama ?>">
                                                       <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                                  </div>
                                             </div>
                                        <?php } ?>
                                        <?php if ($this->session->userdata('akses') == 'petugas') { ?>
                                             <div class="form-group row mb-4">
                                                  <input type="hidden" name="id" id="id" value="<?= $s->id_petugas ?>">
                                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="nama">Nama</label>
                                                  <div class="col-sm-12 col-md-7">
                                                       <input type="text" class="form-control" name="nama" id="nama" value="<?= $s->nama_petugas ?>">
                                                       <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                                  </div>
                                             </div>
                                        <?php } ?>
                                        <?php if ($this->session->userdata('akses') == 'masyarakat') { ?>
                                             <div class="form-group row mb-4">
                                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="email">Email</label>
                                                  <div class="col-sm-12 col-md-7">
                                                       <input type="email" class="form-control" name="email" id="email" value="<?= $s->email_masyarakat ?>">
                                                  </div>
                                             </div>
                                        <?php } else { ?>
                                             <div class="form-group row mb-4">
                                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="email">Email</label>
                                                  <div class="col-sm-12 col-md-7">
                                                       <input type="email" class="form-control" name="email" id="email" value="<?= $s->email_petugas ?>">
                                                  </div>
                                             </div>
                                        <?php } ?>
                                        <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="telp">No Telepon</label>
                                             <div class="col-sm-12 col-md-7">
                                                  <input type="number" class="form-control" name="telp" id="telp" value="<?= $s->telp ?>">
                                             </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="foto">Foto</label>
                                             <div class="col-sm-12 col-md-7">
                                                  <img src="<?= base_url() . 'gambar/profile/' . $s->foto ?>" width="30%" style="border-radius: 5%;">
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
                              <?php } ?>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
     </section>
</div>