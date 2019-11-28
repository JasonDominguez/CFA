<?php
  if(session_id() == '' || !isset($_SESSION)) {
    session_start();
  }

  unset($_SESSION['userid']);
  unset($_SESSION['logged_in']);

  $_SESSION['message'] = "$user Logged out";
  require('index.php');
?>
