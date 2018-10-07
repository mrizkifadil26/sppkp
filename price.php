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
              <i class="fas fa-pencil-alt"></i>
              Profil
            </div>
            <div class="card-body">
              <form action="" role="form">
                <div class="form-group row">
                  <label for="inputProfile" class="col-sm-3 col-form-label">Judul</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control form-control-lg" id="inputProfile">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputContent" class="col-form-label">Content</label>
                  <textarea name="editorContent" class="form-control" id="editorContent" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group row">
                  <label for="inputCategory" class="col-sm-3 col-form-label">Category</label>
                  <div class="col-sm-9">
                    <select name="" id="inputCategory" class="form-control">
                      <option value="category1">Category 1</option>
                      <option value="category2">Category 2</option>
                      <option value="category3">Category 3</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputUpload">Upload</label>
                  <input type="file" class="form-control-file" id="inputUpload">
                </div>
                <div class="form-group">
                  <input type="button" class="btn btn-primary" value="Submit">
                </div>
              </form>
            </div>
            <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <?php include('includes/scrolltop.php'); ?>

    <!-- Logout Modal-->
    <?php include('_includes/modal.php'); ?>

    <!-- JS Libraries -->
    <?php include('_includes/jslib.php'); ?>

  </body>

</html>
