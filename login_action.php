<?php
  if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
  }

  if (empty($_POST['userid']) || empty($_POST['password']) ) {
    $_SESSION['message'] = "Please login";
    require('login.php');
    return;
  }

    // check credentials
    //  if ($_POST['userid'] == $user['userid'] && $user['password'] ==
    //      password_hash($_POST['password'], PASSWORD_BCRYPT, ['salt' => $user['salt']]) ) {

    // $db = new SQLite3('cfa.db') or die('Unable to open database');
    
    // $user = sanitize($_POST['userid']);
    // $pass = sanitize($_POST['password']);

    // $result = $db->query("SELECT * FROM users WHERE userId = $user;") or die('Query failed');

    // while ($row = $result->fetchArray())
    // {
    //     echo "User: {$row['userId']}\nFirst name: {$row['fname']}\n";
    // } 
    // $db->close();

//   if ($_POST['userid'] == $user['userid'] && password_verify($_POST['password'], $user['password'])) {

//     $_SESSION['userid'] = $_POST['userid'];
//     $_SESSION['logged_in'] = true;
//     $_SESSION['message'] = $_SESSION['userid'] . " logged in";
//     require('index.php');
//   }

  else {
    $_SESSION['message'] = "Invalid credentials - please try again";
    require('login.php');
  }

?>