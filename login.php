<?php
  if(session_id() == '' || !isset($_SESSION)) {
    // session isn't started
    session_start();
  }
?>

<?php
  // if already logged in, forward to home page
  if (!empty($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    $_SESSION['message'] = "You are already logged in";
    require('index.php');
    return;
  }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" > 

<head>
    <meta charset="UTF-8"/>
    <title>Log in</title>
    <link rel="stylesheet" href="cfa.css" />
</head>
<body>

<h2>Login</h2>

<form method="POST" action="login_action.php">

  <p>User Id:<input type="text" name="userid" /></p>
  <p>Password:<input type="password" name="password" /></p>
  <p><input type="submit" value="Login"/></p>

</form>

<hr/>

<?php 
  if ( !empty($_SESSION['message'])) {
    echo $_SESSION['message']; 
    unset($_SESSION['message']);
  }
?>

<?php include('common/footer.php'); ?>
</body> 

</html>