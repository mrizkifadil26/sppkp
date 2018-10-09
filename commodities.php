<?php

  session_start();
  include('config.php');

  if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit;
  }

  if (!empty($_GET['delete'])) {
    $query = "UPDATE `komoditi` 
              SET `hapus` = 1
              WHERE id = '" . $_GET['delete'] . "'";
    $result = mysqli_query($connection, $query);

    // Goto URL
  } elseif (!empty($_GET['edit'])) {
    if (!empty($_POST['editKomoditi']) && !empty($_POST['editSatuan'])) {
      $query = "UPDATE `komoditi` 
                SET `komoditi` = '" . $_POST['editKomoditi'] . "',
                    `satuan` = '" . $_POST['editSatuan'] . "'
                WHERE `id` = '" . $_GET['edit'] . "'";
      $result = mysqli_query($connection, $query);

      // Goto URL
      header("Location: commodities.php");
    } else {
      $query = "SELECT `komoditi`, `satuan` FROM `komoditi` 
                WHERE `id` = " . $_GET['edit'] . " AND `hapus` = 0";
      $result = mysqli_query($connection, $query);

      list($komoditi, $satuan) = mysqli_fetch_row($result);
    }
  } elseif (!empty($_POST['komoditi']) && !empty($_POST['satuan'])) {
    $query = "INSERT INTO `komoditi`(`komoditi`, `satuan`)
              VALUES ('" . $_POST['komoditi'] . "',
                      '" . $_POST['satuan'] . "')";
    $result = mysqli_query($connection, $query);
    // Goto URL
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

          <!-- Commodities Content -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-chart-line"></i>
              Komoditi
            </div>
            <div class="card-body">
              <form action="" role="form" method="post">
                <div class="form-group row">
                  <label for="inputKomoditi" class="col-sm-3 col-form-label">Komoditi</label>
                  <div class="col-sm-9">
                    <input type="text" name="komoditi" class="form-control" id="inputKomoditi">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputSatuan" class="col-sm-3 col-form-label">Satuan</label>
                  <div class="col-sm-9">
                    <input type="text" name="satuan" class="form-control" id="inputSatuan">
                  </div>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary" value="Simpan">
                </div>
              </form>
            </div>
            <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
          </div>

          <!-- Commodities Table -->
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-chart-line"></i>
              Data Komoditi</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Komoditi</th>
                      <th>Satuan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Komoditi</th>
                      <th>Satuan</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                    $i = 0;
                    $query = "SELECT `id`, `komoditi`, `satuan`
                              FROM `komoditi` WHERE `hapus` = 0
                              ORDER BY `id`";
                    $result = mysqli_query($connection, $query);

                    while(list($id, $komoditi, $satuan) = mysqli_fetch_row($result)) :
                  ?>
                    <tr>
                      <td><?= ++$i; ?></td>
                      <td><?= $komoditi; ?></td>
                      <td><?= $satuan; ?></td>
                      <td>
                        <button class="btn btn-success" data-toggle="modal" data-target="#editModal<?= $id; ?>">Edit</button> 
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $id; ?>">Delete</button>
                      </td>
                    </tr>
                  <?php include('_includes/commodities-modal.php'); ?>
                  <?php endwhile; ?>
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
    <?php include('_includes/logout-modal.php'); ?>

    <!-- JS Libraries -->
    <?php include('_includes/jslib.php'); ?>

  </body>

</html>
