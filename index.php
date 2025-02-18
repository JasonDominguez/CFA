<?php
  if(session_id() == '' || !isset($_SESSION)) {
    session_start();
  }
  if(strpos($_SERVER['HTTP_HOST'], "localhost") !== FALSE){// For local
    $http = "http://" . $_SERVER['HTTP_HOST'];
    $root = $_SERVER['DOCUMENT_ROOT'];
  }
  else{ // For Web
    $http = "https://" . $_SERVER['HTTP_HOST'] . "/~jdomingu/cs312/project";
    $root = "/home/jdomingu/secure_html/cs312/project";
  }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml-lang="en">

<head>
    <meta charset="UTF-8"/>
    <title>Charlottesville Fishing Association</title>
    <link rel="stylesheet" href=<?php echo "{$http}/cfa.css"; ?> />
</head>
    <body>
        <div class="container">
            <?php 
                include("{$root}/common/header.php");
                include("{$root}/common/menu.php");
                include("{$root}/common/sidebar.php");
            ?>
            <div class="info">
                <div id="welcome">
                <?php
                if ( !empty($_SESSION['message'])) {
                    echo "<h3>", $_SESSION['message'], "</h3>"; 
                    unset($_SESSION['message']);
                }else{
                    echo '<h3>Welcome, to the Charlottesville Fishing Association.</h3>
                    <p>
                    The Charlottesville Fishing Association, CFA, is a group devoted to fishing in and around the Charlottesville, VA area. 
                    </p>';
                }
                ?>
                    
                </div>
                <hr>
                <div class = "content">
                    <p><strong>Next Trip: </strong>Float down the Rivanna River to Milton Landing</p>
                    <p><strong>When: </strong> Saturday at 7am</p>
                    <p><strong>Where: </strong> Starting at Darden Towe Park</p>
                    <p><strong>Description: </strong>Trip will take about four hours. 
                        Volunteers needed to arrive early to set up vehicles at Milton Landing. All members and their guests are welcome.
                    </p>
                </div>
                    <hr>
                <div>
                    <h4>Congratulations to the winners of the summer fishing tournament!</h4> 
                    <p>This year's tournament saw record attendance and fierce competition. 
                        Eight teams had bags weighing over 20 pounds, but James White and Bob Ford 
                        came to the scales with five bass weighing 28.7lbs. Their record catch earned 
                        them the first place prize of $1000. To see their fish and pictures of the 
                        event head over to the general forum page.
                    </p>
                </div>
            </div>
        </div>
        <?php include("{$root}/common/footer.php");?>

  </body>
</html>

