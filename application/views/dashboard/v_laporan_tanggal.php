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
                              <form action="<?= base_url('laporan/tanggal_print') ?>" method="post" target="_blank">
                                   <div class="card-body">
                                        <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="tgl_awal">Tanggal Awal</label>
                                             <div class="col-sm-12 col-md-7">
                                                  <input type="date" class="form-control" name="tgl_awal" id="tgl_awal" value="<?= set_value('tgl_awal') ?>" required>
                                             </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="tgl_akhir">Tanggal Akhir</label>
                                             <div class="col-sm-12 col-md-7">
                                                  <input type="date" class="form-control" name="tgl_akhir" id="tgl_akhir" value="<?= set_value('tgl_akhir') ?>" required>
                                             </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-1 2 col-md-3 col-lg-3"></label>
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