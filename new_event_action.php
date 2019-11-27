<?php  
  $messages = array();
  $error = FALSE;

  $name = $_POST['eventName'];
  $sponsor = $_POST['sponsor'];
  $location = $_POST['location'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $description = $_POST['description'];

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
      ! preg_match("/^[a-zA-Z0-9 ,.'-]+$/", $description) )
  {
    $error = TRUE;
    $messages[] = "Event description is required, no special charaters are allowed";
  }
  
  if((time()-(60*60*24)) > strtotime($date))
  {
    $error = TRUE;
    $messages[] = "Date of event can not have already passed.";
  }

 if (! $error) {
    $file = 'events.txt';
    $data = array(
        "eventName" => $name,
        "sponsor" => $sponsor,
        "location" => $location,
        "date" => $date,
        "time" => $time,
        "description" => $description);

    $jsonLine = json_encode($data) . "|\n"; 
    file_put_contents($file, $jsonLine, FILE_APPEND | LOCK_EX);
    $messages[] = "Your event data has been saved!";
    $messages[] = '<button><span><a href="new_event.php" class="fill">Add another event</a></span></button>';
    
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