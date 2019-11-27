<?php  
// setup
  $messages = array();
  $error = FALSE;

// get the parameters
  $userid = $_POST['userid'];
  $password = $_POST['pass'];
  $cpass = $_POST['confirmPass'];
  $first = $_POST['first'];
  $last = $_POST['last'];
  $email = $_POST['emailaddress'];
  $expirence = $_POST['expirence'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $state = $_POST['state'];

  if ( empty($userid) || ! preg_match("/^[a-zA-Z0-9]{1,20}$/", $userid) ){
    $error = TRUE;
    $messages[] = "UserID is required, only letters and numbers are allowed.";
  }
  if ( empty($password) || ! preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $password) ){
    $error = TRUE;
    $messages[] = "Password is too short or contains invaild characters.";
  }
  if ($password != $cpass){
    $error = TRUE;
    $messages[] = "Passwords do not match.";
  }
  if ( empty($first) || ! preg_match("/^[a-z ,.'-]+$/i", $first) ){
    $error = TRUE;
    $messages[] = "First name is missing or contains invaild characters.";
  }
  if ( empty($last) || ! preg_match("/^[a-z ,.'-]+$/i", $last) ){
    $error = TRUE;
    $messages[] = "Last name is missing or contains invaild characters.";
  }
  if ( empty($email) || ! preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $email) ){
    $error = TRUE;
    $messages[] = "Invalid email address.";
  }
  if ( empty($expirence)){
    $error = TRUE;
    $messages[] = "Expirence level is requried.";
  }
  if ( empty($gender)){
    $error = TRUE;
    $messages[] = "Gender option is requried.";
  }
  if ( empty($age)){
    $error = TRUE;
    $messages[] = "Age is requried.";
  }
  if ( empty($address) || ! preg_match("/^[a-zA-Z0-9 ,.'-]{1,50}$/", $address)){
    $error = TRUE;
    $messages[] = "Address is too long or contains invalid charaters.";
  }
  if ( empty($city) || ! preg_match("/^[a-zA-Z ,.'-]{1,30}$/", $city)){
    $error = TRUE;
    $messages[] = "City is too long or contains invalid charaters.";
  }
  if ( empty($state) ){
    $error = TRUE;
    $messages[] = "Please select a state.";
  }

  if (! $error) {
    $db = new SQLite3('cfa.db');
    $insert = $db->prepare("INSERT INTO users (userId, password, fname, lname, email, expirence, gender, age, address, city, state) 
    VALUES (:id, :password, :fname, :lname, :email, :expirence, :gender, :age, :address, :city, :state);");
    $insert->bindValue(':id', $userid);
    $insert->bindValue(':password', $password);
    $insert->bindValue(':fname', $first);
    $insert->bindValue(':lname', $last);
    $insert->bindValue(':email', $email);
    $insert->bindValue(':expirence', $expirence);
    $insert->bindValue(':gender', $gender);
    $insert->bindValue(':age', $age);
    $insert->bindValue(':address', $address);
    $insert->bindValue(':city', $city);
    $insert->bindValue(':state', $state);
    $insert->execute();
    $db->close();

    $messages[] = "Your registration data has been saved!";
    }
    else{
      $messages[] = '<button><span><a href="registration.php" class="fill">Try Again</a></span></button>';
    }

  // if (! $error) { 
  //   $file = 'registrations.txt';
  //   $data = array(
  //     "id" => $userid, 
  //     "password" => $password, 
  //     "firstName" => $first,
  //     "lastName" => $last,
  //     "email" => $email,
  //     "expirence" => $expirence,
  //     "gender" => $gender,
  //     "age" => $age,
  //     "address" => $address,
  //     "city" => $city, 
  //     "state" => $state);
    
  //   $jsonLine = json_encode($data) . "|\n"; 
  //   file_put_contents($file, $jsonLine, FILE_APPEND | LOCK_EX);
  //   $messages[] = "Your registration data has been saved!";
  // }
  // else{
  //   $messages[] = '<button><span><a href="registration.php" class="fill">Try Again</a></span></button>';
  // }

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" > 

<head>
    <meta charset="UTF-8"/>
    <title>Site registration</title>
    <link rel="stylesheet" href="cfa.css" />
</head>
<body>

<div class="container">

        <?php include('common/header.php');?>
        <?php include('common/menu.php');?>

<p>
<?php
// echo the collected messages 
  foreach ($messages as $message) {
    echo "<center>", $message, "</center>"; 
  }
?>
</p>

<?php include('common/footer.php'); ?>
</body> 

</html>