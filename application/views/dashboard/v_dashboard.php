<!-- Main Content -->
<div class="main-content">
     <section class="section">
          <div class="section-header">
               <h1>Dashboard</h1>
          </div>
          <div class="row">
               <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                         <div class="card-icon bg-primary">
                              <i class="fas fa-users"></i>
                         </div>
                         <div class="card-wrap">
                              <div class="card-header">
                                   <h4>Total Masyarakat</h4>
                              </div>
                              <div class="card-body">
                                   <?= $tot_masyarakat ?>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                         <div class="card-icon bg-info">
                              <i class="fas fa-user-cog"></i>
                         </div>
                         <div class="card-wrap">
                              <div class="card-header">
                                   <h4>Total Petugas</h4>
                              </div>
                              <div class="card-body">
                                   <?= $tot_petugas ?>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                         <div class="card-icon bg-dark">
                              <i class="fas fa-volume-up"></i>
                         </div>
                         <div class="card-wrap">
                              <div class="card-header">
                                   <h4>Total Pengaduan</h4>
                              </div>
                              <div class="card-body">
                                   <?= $tot_pengaduan ?>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                         <div class="card-icon bg-warning">
                              <i class="fas fa-history"></i>
                         </div>
                         <div class="card-wrap">
                              <div class="card-header">
                                   <h4>Total Pengaduan Proses</h4>
                              </div>
                              <div class="card-body">
                                   <?= $tot_proses ?>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                         <div class="card-icon bg-success">
                              <i class="fas fa-check-circle"></i>
                         </div>
                         <div class="card-wrap">
                              <div class="card-header">
                                   <h4>Total Pengaduan Selesai</h4>
                              </div>
                              <div class="card-body">
                                   <?= $tot_selesai ?>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                         <div class="card-icon bg-danger">
                              <i class="fas fa-ban"></i>
                         </div>
                         <div class="card-wrap">
                              <div class="card-header">
                                   <h4>Total Pengaduan Ditolak</h4>
                              </div>
                              <div class="card-body">
                                   <?= $tot_ditolak ?>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>
</div>