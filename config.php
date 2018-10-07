<?php
  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', 'admin123');
  define('DB_NAME', 'sp2kp');

  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

  if ($connection === false) {
    die("Error: Couldn\'t Connect." . mysqli_connect_error());
  }
  /*
  // Function List
  // Function to Print one Page
  function printize($str) 
  {
    echo '<pre>';
    print_r($str);
    echo '</pre>';
  }

  // Function to Alerting
  function alertize($str) 
  {
    echo "<script>alert(" . $str . ")</script>";
  }
  */
  function randomize()
  {
    $characters = 'abcdefghijklmnopqrstuvwxyzQWERTYUIOPASDFGHJKLZXCVBNM0123456789';

    $string = '';
    $maxChar = strlen($characters) - 1;
    for($i = 0; $i < 10; $i++) {
      $string .= $characters[mt_rand(0, $maxChar)];
    }
    return $string;
  }
  /*
  // echo randomize();
  */
  // Function to Encode
  function encodeChar($string) {
    if ( $string[0] == '?') {
      $string = str_replace('?', '', $string);
    }

    $randomize = randomize();

    $_SESSION['get_session'][$randomize] = $string;
    return '?' . $randomize;
  }
  /*
  // echo encodeChar('rizkifadil26');

  // Function to Decode - Error
  print_r($_SERVER['QUERY_STRING']);
  // print_r($_SESSION['get_session']);
  $param = $_SESSION['get_session'][$_SERVER['QUERY_STRING']];
  $array_param = explode('&', $param);

  foreach($array_param as $key => $value) {
    $result = explode('=', $value);
    print_r($result);
    $_GET[$result[0]] = $result[1];
  }
  
  */
  function travelTo($url) 
  {
    if ($url[0] == '?') {
      $url = encodeChar(str_replace('?', '', $url));
      // $url = encode($url);
      echo '<script>window.location = ' . $url . '</script>';
    }
  }
  /*
  if (is_array($_SESSION['get_session']) && $_GET['inc'] != 'printize.php' && !strpos($_SERVER['PHP_SELF']. 'chatlog.php') !== false && !strpos($_SERVER['PHP_SELF'], 'postchat.php') !== false ) {
    foreach($_SESSION['get_session'] as $key => $value) {
      if ($key != $_SERVER['QUERY_STRING']) {
        unset($_SESSION['get_session'][$key]);
      }
    }
  }
  */
?>