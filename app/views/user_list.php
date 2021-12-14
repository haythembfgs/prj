<?php $this->view("includes/header",$data);?>

<?php $this->view("includes/sidenav",$data);?>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <?php $this->view("includes/navbar",$data);?>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Utilisateurs</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Détail</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Password</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date de création</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($data as $user) { ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img href="<?=ASSETS?>img/team-4.jpg" class="avatar avatar-sm me-3 border-radius-lg" alt="user3">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?=$user->username?></h6>
                            <p class="text-xs text-secondary mb-0"><?=$user->email?></p>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?=$user->password?></p>
                        <p class="text-xs text-secondary mb-0"><?=$user->password?></p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <?php if($user->username == 'admin') { ?><span class="badge badge-sm bg-gradient-success">Admin</span><?php } else { ?> <span class="badge badge-sm bg-gradient-secondary">User</span> <?php } ?>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?=$user->date?></span>
                      </td>
                      <td class="align-middle">
                        <a href="user_ctrl?action=edit&id=<?=$user->id?>" class="btn btn-lg bg-gradient-success">Edit 
                        </a> 
                      </td>
                      <td class="align-middle">
                      <a href="user_ctrl?action=delete&id=<?=$user->id?>" class="btn btn-lg bg-gradient-danger">Delete 
                      </a> 
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </main>

<?php $this->view("includes/footer.php", $data); ?>
<?php $this->view("includes/scripts.php", $data); ?>

