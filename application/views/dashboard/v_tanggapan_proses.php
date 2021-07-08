<!-- Main Content -->
<div class="main-content">
     <section class="section">
          <div class="section-header">
               <div class="section-header-back">
                    <a href="<?= base_url('tanggapan') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
               </div>
               <h1><?= $judul ?></h1>
               <div class="section-header-breadcrumb">
                    <?php if ($this->session->userdata('akses') == 'petugas') { ?>
                         <div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
                    <?php } ?>
                    <div class="breadcrumb-item"><a href="<?= base_url('tanggapan') ?>">Pengaduan</a></div>
                    <div class="breadcrumb-item"><?= $judul ?></div>
               </div>
          </div>

          <div class="section-body">
               <div class="row">
                    <div class="col-12">
                         <div class="card">
                              <?= form_open_multipart('tanggapan/tanggapan_aksi') ?>
                              <?php foreach ($pengaduan as $p) { ?>
                                   <div class="card-body">
                                        <div class="form-group row mb-4">
                                             <input type="hidden" name="id" id="id" value="<?= $p->id_pengaduan ?>">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="tgl_pengaduan">Tanggal Pengaduan</label>
                                             <div class="col-sm-12 col-md-7">
                                                  <input type="text" class="form-control" name="tgl_pengaduan" id="tgl_pengaduan" value="<?= longdate_indo($p->tgl_pengaduan) ?>" disabled>
                                             </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="nik">Nomor Induk Pengaduan</label>
                                             <div class="col-sm-12 col-md-7">
                                                  <input type="text" class="form-control" name="nik" id="nik" value="<?= $p->nik ?>" disabled>
                                             </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="laporan">Laporan</label>
                                             <div class="col-sm-12 col-md-7">
                                                  <textarea name="laporan" id="laporan" style="height: 120px;" class="form-control" disabled><?= $p->isi_laporan ?></textarea>
                                             </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="foto">Foto</label>
                                             <div class="col-sm-12 col-md-7">
                                                  <img src="<?= base_url() . 'gambar/pengaduan/' . $p->foto_pengaduan ?>" width="100%">
                                             </div>
                                        </div>
                                        <?php if ($p->status == '0') { ?>
                                             <div class="form-group row mb-4">
                                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="tanggapan">Tanggapan</label>
                                                  <div class="col-sm-12 col-md-7">
                                                       <textarea name="tanggapan" id="tanggapan" style="height: 100px;" class="form-control"></textarea>
                                                  </div>
                                             </div>
                                        <?php } elseif ($p->status == 'proses') { ?>
                                             <div class="form-group row mb-4">
                                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="tanggapan">Tanggapan</label>
                                                  <div class="col-sm-12 col-md-7">
                                                       <textarea name="tanggapan" id="tanggapan" style="height: 100px;" class="form-control" disabled><?= $tanggapan->tanggapan ?></textarea>
                                                  </div>
                                             </div>
                                        <?php } ?>

                                        <?php if ($p->status == '0') { ?>
                                             <div class="form-group row mb-4">
                                                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                                  <div class="col-sm-12 col-md-7">
                                                       <button class="btn btn-primary float-right" type="submit">Submit</button>
                                                  </div>
                                             </div>
                                        <?php } ?>
                                   </div>
                              <?php } ?>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
     </section>
</div>