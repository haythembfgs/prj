<?php $this->view("includes/header",$data);?>

  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
 
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Reset Password</h4>
                  <div class="row mt-3">
                    <div class="col-2 text-center ms-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-facebook text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center px-1">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-github text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center me-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-google text-white text-lg"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <p><?php check_message() ?></p>
                <form role="form" action="forgot" method="POST" class="text-start">
                <input type="hidden" name="id" value="<?= $data[0]->id;?>" class="form-control">
                <b><label class="form-label">Password</label></b>
                  <div class="input-group input-group-outline mb-3">
                    <input type="password" name="password" class="form-control">
                  </div>
                  <b><label class="form-label">Re-Type Password</label></b>
                  <div class="input-group input-group-outline mb-3">
                    <input type="password" name="cpassword" class="form-control">
                  </div>
                  <div class="text-center">
                    <button type="submit" name="action"  value = "reset" class="btn bg-gradient-primary w-100 my-4 mb-2">Reset</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>
  </main>

<?php $this->view("includes/footer.php", $data); ?>
<?php $this->view("includes/scripts.php", $data); ?>

