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
                              <form action="<?= base_url('laporan/bulan_filter') ?>" method="post" target="_blank">
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
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="bln_awal">Bulan Awal</label>
                                             <div class="col-sm-12 col-md-7">
                                                  <select name="bln_awal" id="bln_awal" class="form-control" required>
                                                       <option value="">-- Pilih Bulan Awal --</option>
                                                       <option value="1">Januari</option>
                                                       <option value="2">Febuari</option>
                                                       <option value="3">Maret</option>
                                                       <option value="4">April</option>
                                                       <option value="5">Mei</option>
                                                       <option value="6">Juni</option>
                                                       <option value="7">Juli</option>
                                                       <option value="8">Agustus</option>
                                                       <option value="9">September</option>
                                                       <option value="10">Oktober</option>
                                                       <option value="11">November</option>
                                                       <option value="12">Desember</option>
                                                  </select>
                                                  <?= form_error('bln_awal', '<small class="text-danger">', '</small>'); ?>
                                             </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                             <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="bln_akhir">Bulan Akhir</label>
                                             <div class="col-sm-12 col-md-7">
                                                  <select name="bln_akhir" id="bln_akhir" class="form-control" required>
                                                       <option value="">-- Pilih Bulan Akhir --</option>
                                                       <option value="1">Januari</option>
                                                       <option value="2">Febuari</option>
                                                       <option value="3">Maret</option>
                                                       <option value="4">April</option>
                                                       <option value="5">Mei</option>
                                                       <option value="6">Juni</option>
                                                       <option value="7">Juli</option>
                                                       <option value="8">Agustus</option>
                                                       <option value="9">September</option>
                                                       <option value="10">Oktober</option>
                                                       <option value="11">November</option>
                                                       <option value="12">Desember</option>
                                                  </select>
                                                  <?= form_error('bln_akhir', '<small class="text-danger">', '</small>'); ?>
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