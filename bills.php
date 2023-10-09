<?php require_once('includes/db_connection.php');?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width" />
<meta name="keywords" content="MYPAC, mypac, my personal accountant, My Personal Accountant, Mobile Perosnal Accountant" />
<link href="css/styles.css" rel="stylesheet" type="text/css" />
<title>My Bills</title>
</head>

<body>
<div id="wrapper">

<input id="menu-toggle" class="menu-toggle" type="checkbox">
<nav>
    <div class="menu">
        <ul class="group" id="nav">
        
            <li>
              <a href="dashboard.php"><div class="menuimg"><img src="img/status_away.png" height="32" width="32" /></div>Dashboard</a>
             </li>
             
             <li>
                <a href="earnings.php"><div class="menuimg"><img src="img/invoice.png" height="32" width="32" /></div>Earnings</a>
             </li>
             
            <li class="current_page_item">
              <a href="bills.php"><div class="menuimg"><img src="img/bill.png" height="32" width="32" /></div>Bills</a>
             </li>
             
            <li>
              <a href="expenses.php"> <div class="menuimg"><img src="img/wallet.png" height="32" width="32" /></div>Expenses</a>
             </li>
             
        </ul>
        </nav>
      
      <section id="content">
<div class="top-bar">
  <label for="menu-toggle" id="toggle">≡ <span>Menu</span>
  <div id="mypac">Mypac</div></div> 
      
      <div id="display_status">
      
	</div>
      </section>
      
</div>
</body>
</html>
<?php
	//Close connection
	if (isset($connection)){
	mysql_close($connection);
	}

?>