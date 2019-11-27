<?php $page = basename($_SERVER['PHP_SELF']); ?>
<div id="footer">
    <div class = "navbar">
        <ul>
            <li class="<?php if($page == 'index.php'){ echo 'active';}?>"><a href="index.php">Home</a></li>
            <li class="<?php if($page == 'about.php'){ echo 'active';}?>"><a href="about.php">About</a></li>
            <li class="<?php if($page == 'events.php'){ echo 'active';}?>"><a href="events.php">Events</a></li>
            <li class="<?php if($page == 'categories.php'){ echo 'active';}?>"><a href="categories.php">Categories</a></li>
            <li class="<?php if($page == 'faq.php'){ echo 'active';}?>"><a href="faq.php">FAQ</a></li>
            <li class="<?php if($page == 'registration.php'){ echo 'active';}?>"><a href="registration.php">Register</a></li>
        </ul>
    </div>
</div>