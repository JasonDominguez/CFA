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
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" > 

<head>
    <meta charset="UTF-8"/>
    <title>Charlottesville Fishing Association</title>
    <link rel="stylesheet" href=<?php echo "{$http}/cfa.css"; ?> />
    <script src=<?php echo "{$http}/js/registrationCheck.js"; ?> async></script>
</head>

<body>
  <div class="container">
          
    <?php include($root.'/common/header.php');?>
    <?php include($root.'/common/menu.php');?>

    <div class = "formBox">

      <h1>Online Registration</h1>

      <hr>

      <form method="POST" action=<?php echo "{$http}/actionScripts/registration_action.php" ?> onsubmit="return validateForm('results');">
      <table>
        <tr class="instruction"><td>Length must be no more that 20 characters and contain only letters and numbers.</td></tr>
        <tr>
          <td>
            <label for="userid"><b>User ID</b></label>
            <input 
            id="userid"
            type="text" 
            class="empty" 
            size="20" 
            name="userid" 
            placeholder="UserID" 
            value="" 
            pattern="[a-zA-Z0-9]+"
            onchange="checkID(this)" 
            autofocus
            required>
          </td>
        </tr>
        <tr class="spacer"> </tr>
        <tr class="instruction"><td>Minimum eight characters, at least one letter, one number and one special character.</td></tr>
        <tr>
          <td>
            <label for="pass"><b>Password</b></label>
            <input 
            id="pass"
            type="password"
            class="empty" 
            minlength="8" 
            name="pass"
            placeholder="Password"
            value=""
            pattern="(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}" 
            onchange="checkPass(this)"
            required>
          </td>
          <td>
            <label for="confirmPass"><b>Re-enter Password</b></label>
            <input 
            id="confirmPass"
            type="password"
            class="empty" 
            minlength="8" 
            name="confirmPass"
            placeholder="Re-enter Password"  
            value=""
            pattern="(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}" 
            onchange="checkPassMatch()"
            required>
          </td>
        </tr>
        <tr class="spacer"> </tr>
        <tr class="instruction"><td>No more than 30 characters each.</td></tr>
        <tr>
          <td>
            <label for="first"><b>First Name</b></label>
            <input 
            id="first"
            type="text"
            class="empty"
            size="30" 
            name="first" 
            placeholder="First Name" 
            value="" 
            pattern="[a-zA-Z ,.'-]+"
            onchange="checkName(this)" 
            required>
          </td>
          <td>
            <label for="last"><b>Last Name</b></label>
            <input 
            id="last"
            type="text"
            class="empty" 
            size="30" 
            name="last"
            placeholder="Last Name"  
            value=""
            pattern="[a-zA-Z ,.'-]+" 
            onchange="checkName(this)" 
            required>
          </td>
        </tr>
        <tr class="spacer"> </tr>
        <tr class="instruction"><td>Please enter a valid email address.</td></tr>
        <tr>
          <td>
            <label for="email"><b>Email</b></label>
            <input 
            id="email"
            type="email" 
            class="empty" 
            size="30" 
            name="emailaddress" 
            placeholder="Email" 
            value="" 
            onchange="checkEmail(this)" 
            required>
          </td>
        </tr>
        <tr class="spacer"> </tr>
        <tr>
          <td>
          <label for="expirence"><b>Expirence Level</b></label>
            <select id="expirence" name="expirence" required>
              <option value="">Select</option>
              <option value="none">None</option>
              <option value="beginner">Beginner</option>
              <option value="intermediate">Intermediate</option>
              <option value="expert">Expert</option>
            </select>
          </td>
        </tr>
        <tr class="spacer"> </tr>
        <tr>
          <td>
            <label for="gender"><b>Gender</b></label><br>
            <input type="radio" name="gender" value="male" required> Male<br>
            <input type="radio" name="gender" value="female"> Female<br>
            <input type="radio" name="gender" value="other"> Other<br>
          </td>
        </tr>
        <tr class="spacer"> </tr>
        <tr>
          <td>
            <label for="age"><b>Age</b></label>
            <input 
            type="number"
            class="empty" 
            min="18"
            max="120" 
            name="age"
            required>
          </td>
        </tr>
        <tr class="spacer"> </tr>
        <tr>
          <td>
            <label for="address"><b>Street Address</b></label>
            <input 
            id="address"
            type="text" 
            class="empty" 
            size="50" 
            name="address" 
            placeholder="Street Address" 
            value="" 
            pattern="[a-zA-Z0-9 ,.'-]+"
            onchange="checkStreet(this)" 
            required>
          </td>
          <td>
            <label for="city"><b>City</b></label>
            <input 
            id="city"
            type="text" 
            class="empty" 
            size="30" 
            name="city" 
            placeholder="city" 
            value="" 
            pattern="[a-zA-Z ,.'-]+"
            onchange="checkCity(this)" 
            required>
          </td>
        </tr>
        <tr class="spacer"> </tr>
        <tr>
          <td>
            <label for="state"><b>State</b></label>
            <select id="state" name="state" required>
              <option value="AL">Alabama</option>
              <option value="AK">Alaska</option>
              <option value="AZ">Arizona</option>
              <option value="AR">Arkansas</option>
              <option value="CA">California</option>
              <option value="CO">Colorado</option>
              <option value="CT">Connecticut</option>
              <option value="DE">Delaware</option>
              <option value="DC">District Of Columbia</option>
              <option value="FL">Florida</option>
              <option value="GA">Georgia</option>
              <option value="HI">Hawaii</option>
              <option value="ID">Idaho</option>
              <option value="IL">Illinois</option>
              <option value="IN">Indiana</option>
              <option value="IA">Iowa</option>
              <option value="KS">Kansas</option>
              <option value="KY">Kentucky</option>
              <option value="LA">Louisiana</option>
              <option value="ME">Maine</option>
              <option value="MD">Maryland</option>
              <option value="MA">Massachusetts</option>
              <option value="MI">Michigan</option>
              <option value="MN">Minnesota</option>
              <option value="MS">Mississippi</option>
              <option value="MO">Missouri</option>
              <option value="MT">Montana</option>
              <option value="NE">Nebraska</option>
              <option value="NV">Nevada</option>
              <option value="NH">New Hampshire</option>
              <option value="NJ">New Jersey</option>
              <option value="NM">New Mexico</option>
              <option value="NY">New York</option>
              <option value="NC">North Carolina</option>
              <option value="ND">North Dakota</option>
              <option value="OH">Ohio</option>
              <option value="OK">Oklahoma</option>
              <option value="OR">Oregon</option>
              <option value="PA">Pennsylvania</option>
              <option value="RI">Rhode Island</option>
              <option value="SC">South Carolina</option>
              <option value="SD">South Dakota</option>
              <option value="TN">Tennessee</option>
              <option value="TX">Texas</option>
              <option value="UT">Utah</option>
              <option value="VT">Vermont</option>
              <option value="VA">Virginia</option>
              <option value="WA">Washington</option>
              <option value="WV">West Virginia</option>
              <option value="WI">Wisconsin</option>
              <option value="WY">Wyoming</option>
            </select>
            </td>
          </tr>
          <tr class="spacer"> </tr>
      </table>
      
      <input type="submit" name="action" value="Submit"><br><br>
      </form>
    </div>

  </div>
    
  <?php include($root.'/common/footer.php'); ?>
  
</body>
</html>