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

          <!-- Survei Content -->
          <!-- Commodities Content -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-file-alt"></i>
              Survei
            </div>
            <div class="card-body">
              <form action="" role="form">
                <div class="form-group row">
                  <label for="inputKomoditi" class="col-sm-3 col-form-label">Komoditi</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputKomoditi" value="Gula" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputSatuan" class="col-sm-3 col-form-label">Satuan</label>
                  <div class="input-group col-sm-9">
                    <input type="text" class="form-control" id="inputSatuan" aria-describedby="unit-addon">
                    <div class="input-group-append">
                      <span class="input-group-text" id="unit-addon">kg</span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="button" class="btn btn-primary" value="Simpan">
                </div>
              </form>
            </div>
            <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
          </div>

          <!-- Commodities Content -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-file-alt"></i>
              Data Survei
            </div>
            <div class="card-body">
            <form>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputKomoditi">Komoditi</label>
                  <input type="text" class="form-control" id="inputKomoditi" value="Gula" readonly>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputHarga">Harga</label>
                  <div class="input-group">
                    <input type="text" class="form-control" id="inputHarga" aria-describedby="unit-addon">
                    <div class="input-group-append">
                      <span class="input-group-text" id="unit-addon">kg</span>
                    </div>
                  </div>
                </div>
              </div>
              <input type="submit" class="btn btn-primary" value="Simpan" />
            </form>
            </div>
            <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
          </div>

          <!-- Commodities Table -->
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-file-alt"></i>
              Data Survei</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Komoditi</th>
                      <th>Harga</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Komoditi</th>
                      <th>Harga</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td>
                        <label for="dataKomoditi" class="col-form-label">Gula</label>
                      </td>
                      <td>
                        <div class="input-group">
                          <input type="text" class="form-control" id="inputSatuan" aria-describedby="unit-addon">
                          <div class="input-group-append">
                            <span class="input-group-text" id="unit-addon">kg</span>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>  
            </div>
            <div class="card-footer">
                <input type="button" class="btn btn-primary" value="Simpan">
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
