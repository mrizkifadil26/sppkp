<?php

  session_start();

  if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit;
  }

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <!-- Head and Meta Tags -->
    <?php include('_includes/head.php'); ?>

  </head>

  <body id="page-top">

    <!-- Navbar -->
    <?php include('_includes/navbar.php'); ?>

    <div id="wrapper">

      <!-- Sidebar -->
      <?php include('_includes/sidebar.php'); ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <?php include('_includes/breadcrumb.php'); ?>

          <!-- Users Content -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-user"></i>
              Pengguna
            </div>
            <div class="card-body">
              <form action="" role="form">
                <div class="form-group row">
                  <label for="inputUsername" class="col-sm-3 col-form-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputUsername">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" id="inputPassword">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputRole" class="col-sm-3 col-form-label">Role</label>
                  <div class="col-sm-9">
                    <select name="" id="inputRole" class="form-control">
                      <option value="">Admin</option>
                      <option value="">Operator</option>
                      <option value="">Surveyor</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <input type="button" class="btn btn-primary" value="Simpan">
                </div>
              </form>
            </div>
            <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
          </div>

          <!-- Users Table -->
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-users"></i>
              Data Pengguna</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Username</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Admin</td>
                      <td>Admin</td>
                      <td><a href="#">[Edit]</a> <a href="http://">[Delete]</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>  
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php include('_includes/footer.php'); ?>
        

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <?php include('_includes/scrolltop.php'); ?>

    <!-- Logout Modal-->
    <?php include('_includes/modal.php'); ?>

    <!-- JS Libraries -->
    <?php include('_includes/jslib.php'); ?>

  </body>

</html>
