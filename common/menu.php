<?php $page = basename($_SERVER['PHP_SELF']); ?>
<div class = "navbar">
    <ul>
        <li class="<?php if($page == 'index.php'){ echo 'active';}?>"><a href="index.php">Home</a></li>
        <li class="<?php if($page == 'about.php'){ echo 'active';}?>"><a href="about.php">About</a></li>
        <li class="<?php if($page == 'events.php'){ echo 'active';}?>"><a href="events.php">Events</a></li>
        <li class="<?php if($page == 'categories.php'){ echo 'active';}?>"><a href="categories.php">Categories</a></li>
        <li class="<?php if($page == 'faq.php'){ echo 'active';}?>"><a href="faq.php">FAQ</a></li>
        <?php 
        if(!empty($_SESSION['logged_in']) && $_SESSION['logged_in']){
            echo '<li style="float:right;"><a class="logout" href="logout_action.php">Logout</a></li>';
        }
        else {
            echo '<li style="float:right;"><a class="login" href="registration.php">Register</a></li>';
            echo '<li style="float:right;"><a class="login" href="login.php">Login</a></li>';  
        }
        ?>
    </ul>
</div>