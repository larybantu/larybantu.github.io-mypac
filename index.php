<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="MYPAC, mypac, my personal accountant, My Personal Accountant, Mobile Perosnal Accountant" />
    <meta name="description" content="My personal Accontant(MYPAC) is a mobile web app that is used to make proper accounting of your money and help you realise how you spend, what you occasionally spend on, and how much you can spend in a given period of time. It also generates reports on your income expense and bills to assist you with your day to day personal fincancing. Giving pointers on your spending habits, this app will avail how much spendable income is available and encourage you to have proper use of money" />
    <meta name="author" content="Auxi LaryB" />
    <meta name="copyright" content="mypersonalaccountant" />	
    <link href="css/login.css" rel="stylesheet" type="text/css" />
<title>My Personal Accountant</title>
</head>

<body>
<?php require_once("includes/db_connection.php"); ?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php 
	if (logged_in()) {
		redirect_to("dashboard.php");
	}

	include_once("includes/form_functions.php");
	
	// START FORM PROCESSING
	if (isset($_POST['submit'])) { // Form has been submitted.
		$errors = array();

		// perform validations on the form data
		$required_fields = array('username', 'password');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		$fields_with_lengths = array('username' => 30, 'password' => 30);
		$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));

		$username = trim(mysql_prep($_POST['username']));
		$password = trim(mysql_prep($_POST['password']));
		$hsd_password = sha1($password);
		
		if ( empty($errors) ) {
			// Check database to see if username and the hashed password exist there.
			$query = "SELECT user_id, username, profile_name FROM users WHERE username = '{$username}' AND hsd_password = '{$password}' LIMIT 1";
			$result_set = mysql_query($query);
			confirm_query($result_set);
			if (mysql_num_rows($result_set) == 1) {
				// username/password authenticated
				// and only 1 match
				$found_user = mysql_fetch_array($result_set);
				$_SESSION['user_id'] = $found_user['user_id'];
				$_SESSION['username'] = $found_user['profile_name'];
				
				redirect_to("dashboard.php");
			} else {
				// username/password combo was not found in the database
				$message = "Username/password combination incorrect";
			}
		} else {
			if (count($errors) == 1) {
				$message = "There was 1 error in the form.";
			} else {
				$message = "There were " . count($errors) . " errors in the form.";
			}
		}
		
	} else { // Form has not been submitted.
		if (isset($_GET['logout']) && $_GET['logout'] == 1) {
			$message = "You are now logged out.";
		} 
		$username = "";
		$password = "";
	}
?>
    <div id="wrapper">
    
        <div id="contentmenu"> 
       
        
        <form name="login-form" class="login-form" action="index.php" method="post">
        
            <div class="header">
            <img src="img/logosmall.png"  />
            </div>
            <div class="wrd">My Personal Accountant</div>
            
            
            <div class="content">
            <input name="username" type="text" class="input username" placeholder="Username" />
            <div class="user-icon"></div>
            <input name="password" type="password" class="input password" placeholder="Password" />
            <div class="pass-icon"></div>		
            </div>
            <div class="message">
            <?php if (!empty($message)) { echo $message; } ?>
			<?php if (!empty($errors)) { display_errors($errors); } ?>
            </div>
            
            <div class="footer">
            <input type="submit" name="submit" value="Login" class="button" />
            <a href="register.php" class="register" >Register</a>
           
            </div>
             <div class="endnote">Designed by Auxi</div>
            
        </form>
        
        </div>
    </div>

</body>
</html>
<?php
	//Close connection
	if (isset($connection)){
	mysql_close($connection);
	}

?>