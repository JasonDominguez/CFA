<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" > 

<head>
    <meta charset="UTF-8"/>
    <title>Charlottesville Fishing Association</title>
    <link rel="stylesheet" href="cfa.css" />
    <script src="js/eventCheck.js" async></script>
</head>

<body>
    <div class="container">
          
        <?php include('common/header.php');?>
        <?php include('common/menu.php');?>

        <div class = "formBox">
            <h1>New Event</h1>
            <hr>
            <form method="POST" action="new_event_action.php" onsubmit="return validateForm('results');">

            <label for="eventName"><b>Name of the event:</b></label>
            <input 
            id="eventName" 
            type="text" 
            class="empty" 
            size="60" 
            name="eventName" 
            placeholder="Event Name" 
            value="" 
            pattern="[a-zA-ZÀ-ÿ ,.'-]+"
            onchange="checkName(this)" 
            required><br><br>
         
            <label for="sponsor"><b>Name of event sponsor:</b></label>
            <input 
            id="sponsor"
            type="text"
            class="empty"
            size="50" 
            name="sponsor" 
            placeholder="Sponsor's full name" 
            value="" 
            pattern="[a-zA-ZÀ-ÿ ,.'-]+"
            onchange="checkName(this)" 
            required><br><br>

            <label for="location"><b>Address of the event:</b></label>
            <input 
            id="location"
            type="text"
            class="empty"
            size="100" 
            name="location" 
            placeholder="Address" 
            value="" 
            pattern="[a-zA-Z0-9 ,.'-]+"
            onchange="checkAddress(this)" 
            required><br><br>

            <label for="date"><b>Event date:</b></label>
            <input 
            id="date"
            type="date" 
            class="empty"
            name="date" 
            value="" 
            onchange="checkDate(this)" 
            required><br><br>

            <label for="time"><b>Time:<b></label>
            <input 
            id ="time"
            type="time" 
            name="time"
            required><br><br>

            <textarea id="description" name="description" class="empty" maxlength="1000" cols="110" rows="10" wrap="hard" placeholder="Enter a description of the event here..." onchange="checkDesc(this)" required></textarea><br><br>

            <input type="submit" name="action" value="Submit"><br><br>
            </form>
        </div>
    </div>
    
  <?php include('common/footer.php'); ?>
  
</body>
</html>