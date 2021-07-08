<!-- Main Content -->
<div class="main-content">
     <section class="section">
          <div class="section-header">
               <div class="section-header-back">
                    <a href="<?= base_url('laporan') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
               </div>
               <h1><?= $judul ?></h1>
               <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
                    <div class="breadcrumb-item"><?= $judul ?></div>
               </div>
          </div>

          <div class="section-body">
               <div class="row">
                    <div class="col-6">
                         <div class="card">
                              <form action="<?= base_url('laporan/filter_laporan') ?>" method="post">
                                   <div class="card-body">
                                        <label for="filter">Filter Laporan</label>
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>
          </div>
     </section>
</div>