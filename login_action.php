<?php
  if(session_id() == '' || !isset($_SESSION)) {
    session_start();
  }

  if (empty($_POST['userid']) || empty($_POST['password']) ) {
    $_SESSION['message'] = "Please login";
    require('login.php');
    return;
  }

    $db = new SQLite3('cfa.db') or die('Unable to open database');
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    $query = <<<QUERY
    SELECT *
    FROM users
    WHERE userId = '$userid'
QUERY;

    $result = $db->query($query) or die('Query failed');
    while($row = $result->fetchArray()){$data = $row;}
    $db->close();
   
    if ($data && password_verify($password, $data['password_hash'])){
        $_SESSION['userid'] = $_POST['userid'];
        $_SESSION['logged_in'] = true;
        $_SESSION['message'] = $_SESSION['userid'] . " logged in";
        require('index.php');
    }
    else {
        $_SESSION['message'] = "Invalid credentials - please try again";
        require('login.php');
    }
?>