<?php $page = basename($_SERVER['PHP_SELF']); ?>
<div id="footer">
    <div class = "navbar">
        <ul>
        <li class="<?php if($page == 'index.php'){ echo 'active';}?>"><a href=<?php echo "{$http}/index.php"; ?>>Home</a></li>
        <li class="<?php if($page == 'about.php'){ echo 'active';}?>"><a href=<?php echo "{$http}/about.php"; ?>>About</a></li>
        <li class="<?php if($page == 'events.php'){ echo 'active';}?>"><a href=<?php echo "{$http}/events.php"; ?>>Events</a></li>
        <li class="<?php if($page == 'categories.php'){ echo 'active';}?>"><a href=<?php echo "{$http}/categories.php"; ?>>Categories</a></li>
        <li class="<?php if($page == 'faq.php'){ echo 'active';}?>"><a href=<?php echo "{$http}/faq.php"; ?>>FAQ</a></li>
        </ul>
    </div>
</div>