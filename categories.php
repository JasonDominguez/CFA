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
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml-lang="en">

<head>
    <meta charset="UTF-8"/>
    <title>Categories</title>
    <link rel="stylesheet" href=<?php echo "{$http}/cfa.css"; ?> />
</head>

<body>
    <div class="container">

        <?php include($root.'/common/header.php');?>
        <?php include($root.'/common/menu.php');?>
        <?php include($root.'/common/sidebar.php');?>

        <div class="info">
            <section class="categories">
                    <h1>Forum Categories</h1>
                    <ul class="cells">
                        <li>
                            <a href="#" class="fill">General</a>
                            <p>Dedicated to general forum talk not covered in other categories.</p>
                        </li>
                        <li>
                            <a href="#" class="fill">Show Your Catch</a>
                            <p>Post a picture of your catch!</p>
                        </li>
                        <li>
                            <a href="#" class="fill">Fishing Trips</a>
                            <p>Find and coordinate your next fishing trip.</p>
                        </li>
                    </ul>
                    <h1>Members only Categories</h1>
                    <ul class="cells">
                        <li>
                            <a href="#" class="fill">Chris Greene Lake</a>
                            <p>All things fishing on Chris Green Lake</p>
                        </li>
                        <li>
                            <a href="#" class="fill">Ragged Mountain Reservoir</a>
                            <p>Fishing talk on the lake in Ivy</p>
                        </li>
                        <li>
                            <a href="#" class="fill">Beaver Creek Lake</a>
                            <p>Fishing west of the city</p>
                        </li>
                        <li>
                            <a href="#" class="fill">Rivanna</a>
                            <p>Talk about fishing on the reservoir and river</p>
                        </li>
                        <li>
                            <a href="#" class="fill">Lake Albemarle</a>
                            <p>Talk about the big catches from this small lake</p>
                        </li>
                    </ul>
            </section>
        </div>

    </div>

    <?php include($root.'/common/footer.php'); ?>
    
</body>

</html>