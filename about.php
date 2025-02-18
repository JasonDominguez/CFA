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
    <title>About</title>
    <link rel="stylesheet" href=<?php echo "{$http}/cfa.css"; ?> />
</head>

<body>
    <div class="container">
        <?php 
            include($root.'/common/header.php');
            include($root.'/common/menu.php');
            include($root.'/common/sidebar.php');
        ?>
        <div class="info">
            <div class = "content">
                <h3>Our Mission:</h3>
                    <p>
                    The purpose of the CFA is to encourage freshwater fishing, while supporting policies that promote the preservation, conservation 
                    and ecology of all aquatic life.
                    </p> 

                    <hr>

                <h3>Our Objectives:</h3>
                <ul>
                    <li>Maintain a platform that fosters a sport fishing community and the sharing of fishing related conversation.</li>
                    <br>
                    <li>Educate members and the public on the rules and regulations surrounding sport fishing in the local area.</li>
                    <br>
                    <li>Educate members and the public in the techniques of sport fishing to enhance their enjoyment of the sport.</li>
                    <br>
                    <li>Promote interest and participation in recreational fishing through activities that encourage sport fishing in the Charlottesville area.</li>
                    <br>
                    <li> Plan and conduct fund raising activities to provide the revenues needed to support these objectives. </li>
                </ul>
            </div>
        </div>
    
    </div>
    
    <?php include($root.'/common/footer.php'); ?>

</body>

</html>