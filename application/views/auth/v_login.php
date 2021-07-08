<div class="main-content">
     <section class="section">
          <div class="section-body">
               <div class="container">
                    <div class="row">
                         <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                              <div class="login-brand">
                                   <!-- <img src="../assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle"> -->
                              </div>

                              <div class="card ">
                                   <div class="card-header">
                                        <h4>Login</h4>
                                   </div>

                                   <div class="card-body">
                                        <?= $this->session->flashdata('message'); ?>
                                        <form method="POST" action="<?= base_url('auth/aksi') ?>" class="needs-validation" novalidate="">
                                             <div class="form-group">
                                                  <label for="username">Username</label>
                                                  <input id="username" type="text" class="form-control" name="username" tabindex="1" value="<?= set_value('username') ?>" required autofocus>
                                                  <div class="invalid-feedback">
                                                       Silakan isi username anda
                                                  </div>
                                             </div>

                                             <div class="form-group">
                                                  <label for="password" class="control-label">Password</label>
                                                  <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                                  <div class="invalid-feedback">
                                                       Silakan isi password anda!
                                                  </div>
                                             </div>

                                             <div class="form-group">
                                                  <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                                       Login
                                                  </button>
                                             </div>
                                        </form>

                                   </div>
                              </div>
                              <div class="simple-footer">
                                   Copyright &copy; Reishan Tridya Rafly <?= date('Y') ?>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>
</div>