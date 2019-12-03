<?php
  if(session_id() == '' || !isset($_SESSION)) {
    session_start();
  }
  if(strpos($_SERVER['HTTP_HOST'], "localhost") !== FALSE){// For local
    $http = "http://" . $_SERVER['HTTP_HOST'];
    $root = $_SERVER['DOCUMENT_ROOT'];
  }
  else{ // For Web
    $http = "https://" . $_SERVER['HTTP_HOST'];
    $root = $_SERVER['DOCUMENT_ROOT'];
  }

  unset($_SESSION['userid']);
  unset($_SESSION['logged_in']);

  $_SESSION['message'] = "$user Logged out";
  require_once($root.'/index.php');
?>
