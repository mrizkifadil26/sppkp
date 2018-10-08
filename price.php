<?php

  session_start();
  include('config.php');

  if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit;
  }

  if(isset($_POST['save'])) {
    $query = "DELETE ";

    foreach($_POST['harga'] as $key => $value) {
      $arr_query[] = "('20180930', '" . $key . "', '" . $value . "')";
    }

    if (is_array($arr_query)) {
      $query = "REPLACE INTO `harga`(`tanggal`, `id_komoditi`, `harga`)
                VALUES " . implode(",", $arr_query);
      $result = mysqli_query($connection, $query);
    }

    // Goto URL
  }

  $query = "SELECT `id_komoditi`, `surveyor`, `harga`, `timestamp` 
            FROM `survey` WHERE `tanggal` = '20180930'";
	$result = mysqli_query($connection, $query);
	
	while(list($id_komoditi, $surveyor, $harga, $timestamp) = mysqli_fetch_row($result)) {
		$arr_surveyor[$surveyor] = $surveyor;
		$arr_harga[$id_komoditi][$surveyor] = $harga;
		$arr_timestamp[$id_komoditi][$surveyor] = $timestamp;

		// print_r($arr_surveyor);
		// print_r($arr_harga);
		// print_r($arr_timestamp);
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
              <?php if (!is_array($arr_surveyor)) : ?>
                <center>Data belum tersedia...</center>
              <?php else: ?>
              <form action="" method="post">
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Komoditi</th>
                        <th colspan="<?= count($arr_surveyor); ?>" class="text-center">Harga</th>
                      </tr>
                      <tr>
                        <?php foreach($arr_surveyor as $value): ?>
                        <th><?= $value; ?></th>
                        <?php endforeach; ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                        $i = 0;
                        $query = "SELECT DISTINCT `id_komoditi`, `komoditi` FROM `survey`
                                  LEFT JOIN `komoditi` ON `komoditi`.`id` = `survey`.`id_komoditi`
                                  WHERE `tanggal` = '20180930'";
                        $result = mysqli_query($connection, $query);

                        while(list($id_komoditi, $komoditi) = mysqli_fetch_row($result)) :

                      ?>
                      <tr>
                        <td><?= ++$i; ?></td>
                        <td><?= $komoditi; ?></td>
                        <?php foreach($arr_surveyor as $value) : ?>
                        <td>
                          <?= number_format($arr_harga[$id_komoditi][$value], 0); ?> <br>
                          <small><em>time: <?= substr($arr_timestamp[$id_komoditi][$value], 12, 8); ?></em></small><br>
                          <input type="radio" name="harga[<?= $id_komoditi; ?>]" value="<?= $arr_harga[$id_komoditi][$value]; ?>">
                        </td>
                        <?php endforeach; ?>
                      </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="card-footer">
                <input name="save" type="submit" class="btn btn-primary" value="Publikasikan">
              </div>
            </form>
            <?php endif;?>
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
