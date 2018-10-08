<?php

  session_start();
  include('config.php');

  if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit;
  }

  $query = "SELECT `id_komoditi` FROM `harga`";
  $result = mysqli_query($connection, $query);

  $arr_id_komoditi[] = "''";
  while(list($id_komoditi) = mysqli_fetch_row($result)) {
    $arr_id_komoditi[] = $id_komoditi;
    // echo $id_komoditi . " ";
    // var_dump($arr_id_komoditi);
  }

  if (isset($_POST['save'])) {
    foreach($_POST['harga'] as $key => $value) {
      // echo $key . "<br>";
      // echo $value . "<br>";
      if (!in_array($key, $arr_id_komoditi) && !empty($value)) {
        // Real-time passing data
        // $query = "REPLACE INTO survey (tanggal, id_komoditi, surveyor, harga) VALUES ('".date("Ymd")."', '".$k."','".$_SESSION['sesi_username']."', '".$v."')";
        $query = "REPLACE INTO `survey` (`tanggal`, `id_komoditi`, `surveyor`, `harga`) 
                  VALUES ('20180930', '" . $key . "','" . $_SESSION['username'] . "', '" . $value . "')";
        $result = mysqli_query($connection, $query);
      }
    }
  }

  $query = "SELECT `id_komoditi`, `harga` FROM `survey` 
                  WHERE `tanggal` = '20180930' AND surveyor = '" . $_SESSION['username'] . "'";
  $result = mysqli_query($connection, $query);

  while(list($id_komoditi, $harga) = mysqli_fetch_row($result)) {
    $arr_harga[$id_komoditi] = $harga;
  }

  print_r($harga);

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
              <form action="" role="form" method="post">
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
          <?php 
            $queryShow = "SELECT `id`, `komoditi`, `satuan` FROM `komoditi`
                           WHERE `hapus` = 0 AND `id` NOT IN (" . implode(",", $arr_id_komoditi) . ") 
                           ORDER BY `komoditi`";
            $resultShow = mysqli_query($connection, $queryShow);

          ?>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-file-alt"></i>
              Data Survei
            </div>
            <div class="card-body">
            <form role="form" method="post">
            <?php if (mysqli_num_rows($resultShow) <= 0) : ?>
              <div class="text-center">Prices has been published!</div>
            <?php else: ?>
            <?php while(list($id, $komoditi, $satuan) = mysqli_fetch_row($resultShow)) : ?>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputKomoditi">Komoditi</label>
                  <input type="text" class="form-control" id="inputKomoditi" value="<?= $komoditi; ?>" readonly>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputHarga">Harga</label>
                  <div class="input-group">
                    <input name="harga[<?= $id; ?>]" type="text" class="form-control" id="inputHarga" aria-describedby="unit-addon">
                    <div class="input-group-append">
                      <span class="input-group-text" id="unit-addon">/ <?= $satuan; ?></span>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
              <input type="submit" name="save" class="btn btn-primary" value="Simpan" />
            <?php endif; ?>
            </form>
            </div>
            <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
          </div>

          <!-- Commodities Table -->

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
