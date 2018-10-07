<?php
/* 
  session_start();
  include('config.php');

  if ( !empty( $_POST ) ) {
    if ( isset( $_POST['user_id'] ) && isset( $_POST['password'] ) ) {
      $stmt = $connect->prepare('SELECT * FROM pengguna WHERE id = ?');
      $stmt->bind_param('s', $_POST['user_id']);
      $stmt->execute();

      $result = $stmt->get_result();
      echo $result;
      $user = $result->fetch_object();

      if ( password_verify( $_POST['password'], $user->password ) ) {
        $_SESSION['user_id'] = $user->ID;
      }
    }
  }
 */
?>

<?php

  session_start();

  if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    header('Location: dashboard.php');
    exit;
  }

  require_once('config.php');

  $user_id = $password = '';
  $username_err = $password_err = '';

  // Processing data
  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (empty(trim($_POST['username']))) {
      $username_err = "Please enter username.";
    } else {
      $user_id = trim($_POST['username']);
    }

    // Empty Password checking
    if (empty(trim($_POST['password']))) {
      $password_err = "Please enter your password.";
    } else {
      $password = trim($_POST['password']);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
      // Prepare SELECT statemen
      $query = "SELECT `id`, `pass`, `role` FROM `pengguna` WHERE `id` = ?";

      if ($stmt = mysqli_prepare($connection, $query)) {
        // Bind variables
        mysqli_stmt_bind_param($stmt, "s", $param_username);

        // Set username parameter
        $param_username = $user_id;

        // Attempt to execute
        if (mysqli_stmt_execute($stmt)) {
          // Store result
          mysqli_stmt_store_result($stmt);

          // Checking existence
          if (mysqli_stmt_num_rows($stmt) == 1) {
            // Bind result variables
            mysqli_stmt_bind_result($stmt, $user_id, $password, $role);

            if (mysqli_stmt_fetch($stmt)) {
              if ($password === '123') {
                session_start();

                // Store data session
                $_SESSION['login'] = true;
                $_SESSION['id'] = $user_id;
                $_SESSION['role'] = $role;

                // Redirect
                header("Location: dashboard.php");
              } else {
                // Password not valid error
                $password_err = "The password you entered was not valid.";
              }
            }
          } else {
            // Username doesn't exist
            $username_err = "No account found with that username.";
          }
        } else {
          echo "Oops! Something went wrong. Please try again later.";
        }
      }

      // Close statement
      mysqli_stmt_close($stmt);
    }
    // Close connection
    mysqli_close($connection);

  }
  
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Login</title>

    <!-- Bootstrap core CSS-->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
          <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="form-group <?= (!empty($username_err)) ? 'has-error' : ''; ?>">
              <div class="form-label-group">
                <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
                <label for="inputUsername">Username</label>
                <span class="help-block"><?= $username_err; ?></span>
              </div>
            </div>
            <div class="form-group <?= (!empty($password_err)) ? 'has-error' : ''; ?>">
              <div class="form-label-group">
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
                <label for="inputPassword">Password</label>
                <span class="help-block"><?= $password_err; ?></span>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" value="remember-me">
                  Remember Password
                </label>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="register.html">Register an Account</a>
            <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
