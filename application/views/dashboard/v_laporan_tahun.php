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

          <div class="section-body">
               <div class="row">
                    <div class="col-12">
                         <div class="card">
                              <form action="<?= base_url('laporan/tahun_filter') ?>" method="post" target="_blank">
                                   <div class="card-body">

                                        <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="tahun">Tahun</label>
                                             <div class="col-sm-12 col-md-7">
                                                  <select name="tahun" id="tahun" class="form-control" required>
                                                       <option value="">-- Pilih Tahun --</option>
                                                       <?php foreach ($tahun as $t) { ?>
                                                            <option value="<?= $t->tahun ?>"><?= $t->tahun ?></option>
                                                       <?php } ?>
                                                  </select>
                                                  <?= form_error('tahun', '<small class="text-danger">', '</small>'); ?>
                                             </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                             <div class="col-sm-12 col-md-7">
                                                  <button class="btn btn-primary float-right ml-2 " type="submit"><i class="fas fa-print"></i> Print</button>
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