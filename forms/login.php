<?php
  if(session_id() == '' || !isset($_SESSION)) {
    session_start();
  }
  if(strpos($_SERVER['HTTP_HOST'], "localhost") !== FALSE){// For local
    $http = "http://" . $_SERVER['HTTP_HOST'];
    $root = $_SERVER['DOCUMENT_ROOT']."/";
  }
  else{ // For Web
    $http = "https://" . $_SERVER['HTTP_HOST'];
    $root = $_SERVER['DOCUMENT_ROOT'].shell_exec('pwd');
  }  
?>

<?php
  if (!empty($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    $_SESSION['message'] = "You are already logged in";
    require_once($root/'index.php');
    return;
  }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" > 

<head>
    <meta charset="UTF-8"/>
    <title>Log in</title>
    <link rel="stylesheet" href=<?php echo "{$http}/cfa.css"; ?>>
</head>
<body>

<div class="container">

    <?php include("{$root}/common/header.php");?>
    <?php include("{$root}/common/menu.php");?>

<p>

<h2 style="margin-left:5vw;">Login</h2>

<form method="POST" action=<?php echo "{$http}/actionScripts/login_action.php"; ?>>

  <p style="margin-left:5vw;">User Id:<input type="text" name="userid"/></p>
  <p style="margin-left:5vw;">Password:<input type="password" name="password" /></p>
  <p style="margin-left:5vw;"><input type="submit" value="Login"/></p>

</form>

<hr>

<?php 
  if ( !empty($_SESSION['message'])) {
    echo $_SESSION['message']; 
    unset($_SESSION['message']);
  }
?>

<?php include("{$root}/common/footer.php");?>
</body> 

</html>