<?php 

  if(session_id() == '' || !isset($_SESSION)) {
    session_start();
  }
 
  $messages = array();
  $error = FALSE;

  $name = $_POST['eventName'];
  $sponsor = $_POST['sponsor'];
  $location = $_POST['location'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $description = $_POST['description'];

  function dateExists($date) {
    $db = new SQLite3('cfa.db') or die('Unable to open database');
    $query = "SELECT * FROM event WHERE eventDate='$date';";
    $stmt = $db->querySingle($query);
    if($stmt){
      $db->close();
      return TRUE;
    }else{
      $db->close();
      return FALSE;
    }
  }

  if ( empty($date)){
    $error = TRUE;
    $messages[] = "Date of event is required.";
  }elseif(dateExists($date)){
    $error = TRUE;
    $messages[] = "There is an event already scheduled for that date, please pick a different date."; 
  }

  if ( empty($name) ||
      ! preg_match("/^[a-zA-ZÀ-ÿ ,.'-]+$/", $name) )
  {
    $error = TRUE;
    $messages[] = "The event name is required, only letters are alllowed.";
  }
  if ( empty($sponsor) ||
      ! preg_match("/^[a-zA-ZÀ-ÿ ,.'-]+$/", $sponsor) )
  {
    $error = TRUE;
    $messages[] = "Sponsor name is required, only letters are alllowed.";
  }
  if ( empty($location) ||
      ! preg_match("/^[a-zA-Z0-9 ,.'-]+$/", $location) )
  {
    $error = TRUE;
    $messages[] = "The event location is required.";
  }
  if ( empty($description) ||
      ! preg_match("/^[a-zA-Z0-9 ,.'-(\n)(\r)]+$/", $description) )
  {
    $error = TRUE;
    // $messages[] = "Event description is required, no special charaters are allowed";
    $messages[] = $description;
  }
  
  if((time()-(60*60*24)) > strtotime($date))
  {
    $error = TRUE;
    $messages[] = "Date of event can not have already passed.";
  }

  if (! $error) {
    $db = new SQLite3('cfa.db');
    $insert = $db->prepare("INSERT INTO event (eventName, sponsor, location, eventDate, eventTime, description) 
    VALUES (:name, :sponsor, :location, :date, :time, :description);");
    $insert->bindValue(':name', $name);
    $insert->bindValue(':sponsor', $sponsor);
    $insert->bindValue(':location', $location);
    $insert->bindValue(':date', $date);
    $insert->bindValue(':time', $time);
    $insert->bindValue(':description', $description);
    $insert->execute();
    
    if($insert){
      $messages[] = "Your event data has been saved!";
      $messages[] = '<button><span><a href="new_event.php" class="fill">Add another event</a></span></button>';
    }
    else{
      $messages[] = "something went wrong $name <br> $sponsor <br> $location <br> $date <br> $time";
    }
    $db->close();
    }
  else{
    $messages[] = '<button><span><a href="new_event.php" class="fill">Try Again</a></span></button>';
  }

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" > 

<head>
    <meta charset="UTF-8"/>
    <title>Event registration</title>
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
</div>

<?php include('common/footer.php'); ?>
</body> 

</html>