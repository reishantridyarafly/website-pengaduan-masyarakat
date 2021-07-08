<!-- Main Content -->
<div class="main-content">
     <section class="section">
          <div class="section-header">
               <h1><?= $judul ?></h1>
               <div class="section-header-breadcrumb">
                    <?php if ($this->session->userdata('akses') == 'petugas') { ?>
                         <div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
                    <?php } ?>
                    <div class="breadcrumb-item"><?= $judul ?></div>
               </div>
          </div>
          <?= $this->session->flashdata('message'); ?>
          <div class="section-body">
               <div class="row">
                    <div class="col-12 col-sm-12 col-lg-7">
                         <div class="card author-box card-primary">
                              <div class="card-body">
                                   <div class="author-box-left">
                                        <img alt="image" src="<?= base_url() . 'gambar/profile/' . $user->foto ?>" class="author-box-picture card-img">
                                        <div class="clearfix"></div>
                                        <a href="<?= base_url('profile/profile_edit/' . $user->username) ?>" class="btn btn-primary mt-3">Edit Profile</a>
                                   </div>
                                   <div class="author-box-details">
                                        <div class="author-box-name">
                                             <?php if ($this->session->userdata('akses') == 'masyarakat') { ?>
                                                  <a href="#"><?= $user->nama ?></a>
                                             <?php } elseif ($this->session->userdata('akses') == 'petugas') { ?>
                                                  <a href="#"><?= $user->nama_petugas ?></a>
                                             <?php } ?>
                                        </div>
                                        <div class="author-box-job">
                                             <?php if ($this->session->userdata('akses') == 'masyarakat') { ?>
                                                  Masyarakat
                                             <?php } elseif ($this->session->userdata('akses') == 'petugas') {
                                                  if ($user->level == 'admin') {
                                                       echo 'Administrator';
                                                  } else {
                                                       echo 'Petugas';
                                                  }
                                             } ?>
                                        </div>
                                        <div class="author-box-description">
                                             <table class="table table-sm">
                                                  <?php if ($this->session->userdata('akses') == 'masyarakat') { ?>
                                                       <tr>
                                                            <td>
                                                                 <p>NIK</p>
                                                            </td>
                                                            <td>
                                                                 <p>:</p>
                                                            </td>
                                                            <td>
                                                                 <p><?= $user->nik ?></p>
                                                            </td>
                                                       </tr>
                                                  <?php } ?>
                                                  <tr>
                                                       <td>
                                                            <p>Username</p>
                                                       </td>
                                                       <td>
                                                            <p>:</p>
                                                       </td>
                                                       <td>
                                                            <p><?= $user->username ?></p>
                                                       </td>
                                                  </tr>
                                                  <?php if ($this->session->userdata('akses') == 'petugas') { ?>
                                                       <tr>
                                                            <td>
                                                                 <p>Email</p>
                                                            </td>
                                                            <td>
                                                                 <p>:</p>
                                                            </td>
                                                            <td>
                                                                 <p><?= $user->email_petugas ?></p>
                                                            </td>
                                                       </tr>
                                                  <?php } else { ?>
                                                       <tr>
                                                            <td>
                                                                 <p>Email</p>
                                                            </td>
                                                            <td>
                                                                 <p>:</p>
                                                            </td>
                                                            <td>
                                                                 <p><?= $user->email_masyarakat ?></p>
                                                            </td>
                                                       </tr>
                                                  <?php } ?>
                                                  <tr>
                                                       <td>
                                                            <p>No Telepon</p>
                                                       </td>
                                                       <td>
                                                            <p>:</p>
                                                       </td>
                                                       <td>
                                                            <p><?= $user->telp ?></p>
                                                       </td>
                                                  </tr>
                                                  <tr>
                                                       <td>
                                                            <p>Status</p>
                                                       </td>
                                                       <td>
                                                            <p>:</p>
                                                       </td>
                                                       <td>
                                                            <?php if ($this->session->userdata('akses') == 'masyarakat') { ?>
                                                                 <?= $user->status_masyarakat == '1' ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Banned</span>' ?>
                                                            <?php } else { ?>
                                                                 <?= $user->status == '1' ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Banned</span>' ?>
                                                            <?php } ?>
                                                       </td>
                                                  </tr>
                                             </table>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>
</div>