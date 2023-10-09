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
<title><?php echo $_SESSION['profile_name']?> Dashboard</title>
</head>

<body>
<div id="wrapper">

<input id="menu-toggle" class="menu-toggle" type="checkbox">
<nav>
    <div class="menu">
        <ul class="group" id="nav">
        
            <li class="current_page_item">
              <a href="dashboard.php"><div class="menuimg"><img src="img/status_away.png" height="32" width="32" /></div>Dashboard</a>
             </li>
             
             <li>
                <a href="earnings.php"><div class="menuimg"><img src="img/invoice.png" height="32" width="32" /></div>Earnings</a>
             </li>
             
            <li>
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
      <div class="status">
      <font class="hello">Hello </font><font class="nom"><?php echo $_SESSION['username']?>,</font><br />
      Available Spendable income is {x}.<br />
      John owes you <font class="codered">{x}</font>Ugx, pay date is {dd/mm/yy}.<br />
      </div>

      <div class="bills">
      <div class="codered">Pending Bills:</div>
      {y} bill amount is {x}<br />
      {y1} bill amount is {x1}<br />
      </div>
      
      <div class="payday">
      <div class="nom">PayDay</div>
      Salary is not until {dd/mm/yy}.<br />
      Moses is 5 days past his {x}Ugx debt<br />
      Return from {x-investment} is today<br />
      Total Earnings as of today: {x}ugx<br />
      {x} Bank Balance: {x}ugx
      </div>
      
      <div class="expense">
      <div class="nom">Expense Centre</div>
      Sandra's birthday today. <br />
      </div>
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