<!-- Main Content -->
<div class="main-content">
     <section class="section">
          <div class="section-header">
               <div class="section-header-back">
                    <a href="<?= base_url('tanggapan') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
               </div>
               <h1><?= $judul ?></h1>
               <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="<?= base_url('tanggapan') ?>">Pengaduan</a></div>
                    <div class="breadcrumb-item"><?= $judul ?></div>
               </div>
          </div>

          <div class="section-body">
               <div class="row">
                    <div class="col-12">
                         <div class="card">
                              <?= form_open_multipart('tanggapan/pengaduan_aksi') ?>
                              <div class="card-body">
                                   <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="laporan">Laporan Pengaduan</label>
                                        <div class="col-sm-12 col-md-7">
                                             <textarea name="laporan" id="laporan" class="form-control" style="height: 120px;"><?= set_value('laporan') ?></textarea>
                                             <?= form_error('laporan', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                   </div>
                                   <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="foto">Foto</label>
                                        <div class="col-sm-12 col-md-7">
                                             <input type="file" class="form-control" name="foto" id="foto" value="<?= set_value('foto') ?>">
                                             <!-- <?= form_error('foto', '<small class="text-danger">', '</small>'); ?> -->
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