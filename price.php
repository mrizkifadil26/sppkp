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

          <!-- Price Content -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-balance-scale"></i>
              Verifikasi Harga
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th rowspan="2">No</th>
                      <th rowspan="2">Komoditi</th>
                      <th colspan="3" class="text-center">Harga</th>
                    </tr>
                    <tr>
                      <th>Surveyor 1</th>
                      <th>Surveyor 2</th>
                      <th>Admin</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Komoditi</th>
                      <th>Surveyor 1</th>
                      <th>Surveyor 2</th>
                      <th>Admin</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Gula</td>
                      <td>
                        2,000 <br>
                        <small><em>time: 09:17:15</em></small><br>
                        <input type="radio" name="">
                      </td>
                      <td>
                        2,000 <br>
                        <small><em>time: 09:17:15</em></small><br>
                        <input type="radio" name="">
                      </td>
                      <td>
                        2,000 <br>
                        <small><em>time: 09:17:15</em></small><br>
                        <input type="radio" name="">
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer">
              <input type="button" class="btn btn-primary" value="Publikasikan">
            </div>
            <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
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
