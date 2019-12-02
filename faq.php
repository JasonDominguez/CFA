<?php
  if(session_id() == '' || !isset($_SESSION)) {
    session_start();
  }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml-lang="en">

<head>
    <meta charset="UTF-8"/>
    <title>FAQ</title>
    <link rel="stylesheet" href="cfa.css" />
</head>

<body>
    <div class="container">

            <?php include('common/header.php');?>
            <?php include('common/menu.php');?>
            <?php include('common/sidebar.php');?>

            <div class="info">
                <h1>Frequently Asked Questions</h1>
                <hr>
                <div class="content">
                    <strong>Do I need to be a member to come to CFA events?</strong>
                    <p>Only some events are member only, please check the event description 
                        for event requirements.
                    </p>
                    <hr>
                    <strong>I am interested in becoming a member, how do I join?</strong>
                    <p>Email us at <a href="mailto: admissions@cfa.com">admissions@cfa.com</a> to recive an
                    application.</p>
                    <hr>
                    <strong>How much does joining the CFA cost?</strong>
                    <p>Once the CFA approves your application, a $300 initiation fee is required.
                        After your first year of membership, dues are $100 a year. 
                    </p>
                    <hr>
                    <strong>What does my membership include?</strong>
                    <p>Membership includes access to privet association events, access to our 
                        members only forum boards, and a healthier Charlottesville
                        fishing environment.
                    </p>
                    <hr>
                    <strong>Does CFA membership include a fishing licence?</strong>
                    <p>No, fishing licences must be purchased through the Virginia Department of 
                        Game and Inland Fisheries</p>
                    <hr>
                    <strong>Do I need a fishing licence to fish with the CFA?</strong>
                    <p>Yes, unless you are fishing on privet water, all bodies of water in
                        the area require a fishing licence.
                    </p>
                </div>
            </div>

    </div>
    <?php include('common/footer.php'); ?>
</body>

</html>