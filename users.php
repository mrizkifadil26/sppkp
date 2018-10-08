<?php

  session_start();
  include('config.php');

  if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit;
  }

  if (!empty($_GET['delete'])) {
    $query = "DELETE FROM `pengguna` WHERE id = '" . $_GET['delete'] . "'";
    $result = mysqli_query($connection, $query);

    // Goto URL
  } elseif (!empty($_GET['edit'])) {
    if (!empty($_POST['editUsername']) && !empty($_POST['editRole'])) {
      $query = "UPDATE `pengguna` 
                SET `username` = '" . $_POST['editUsername'] . "',
                    `password` = '" . $_POST['editNewPassword'] . "',
                    `role` = '" . $_POST['editRole'] . "'
                WHERE `id` = '" . $_GET['edit'] . "'";
      $result = mysqli_query($connection, $query);

      // Goto URL
    } else {
      $query = "SELECT * FROM `pengguna` 
                WHERE `id` = " . $_GET['edit'] . "";
      $result = mysqli_query($connection, $query);

      list($id, $username, $password, $role) = mysqli_fetch_row($result);
    }
  } elseif (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['role'])) {
    $query = "INSERT INTO `pengguna`(`username`, `password`, `role`)
              VALUES ('" . $_POST['username'] . "',
                      '" . $_POST['password'] . "',
                      '" . $_POST['role'] . "')";
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

          <!-- Users Content -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-user"></i>
              Pengguna
            </div>
            <div class="card-body">
              <form action="" role="form" method="post">
                <div class="form-group row">
                  <label for="inputUsername" class="col-sm-3 col-form-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputUsername" name="username">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                  <div class="col-sm-9">
                    <input type="password" class="form-control" id="inputPassword" name="password">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputRole" class="col-sm-3 col-form-label">Role</label>
                  <div class="col-sm-9">
                    <select name="role" id="inputRole" class="form-control">
                      <option value="admin">Admin</option>
                      <option value="operator">Operator</option>
                      <option value="surveyor">Surveyor</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary" name="" value="Simpan">
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
                  <?php 
                    $i = 0;
                    $query = "SELECT * FROM `pengguna` ORDER BY `id`";
                    $result = mysqli_query($connection, $query);

                    while(list($userid, $username, $password, $role) = mysqli_fetch_row($result)) :
                  ?>
                    <tr>
                      <td><?= ++$i; ?></td>
                      <td><?= $username; ?></td>
                      <td><?= $role; ?></td>
                      <td>
                        <a class="btn btn-success" href="?edit=<?= $userid; ?>" data-toggle="modal" data-target="#editModal" data-id="<?= $userid; ?>">Edit</a> 
                        <a class="btn btn-danger" href="?delete=<?= $userid; ?>" data-toggle="modal" data-target="#deleteModal" data-id="<?= $userid; ?>">Delete</a>
                      </td>
                    </tr>
                    <!-- Logout Modal -->
                    <?php include('_includes/modal.php'); ?>
                  <?php 
                    endwhile;
                  ?>
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

    <!-- Logout Modal -->
    <?php include('_includes/logout-modal.php'); ?>

    <!-- JS Libraries -->
    <?php include('_includes/jslib.php'); ?>

  </body>

</html>
