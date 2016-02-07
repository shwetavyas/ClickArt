<?php
  session_start();

  // If the session vars aren't set, try to set them with a cookie
  if (!isset($_SESSION['email'])) {
    if (isset($_COOKIE['email'])) {
      $_SESSION['email'] = $_COOKIE['email'];
      $_SESSION['item'] = $_REQUEST['item']; //Newly added
      $_SESSION['finalPrice'] = $_REQUEST['finalPrice'];
      setcookie('email', $row['email'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
    }
  }
?>