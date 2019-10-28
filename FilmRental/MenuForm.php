<html>
<head>
<title>Menu Form</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id = "body">
<div id ="textborder">
<h1 id="text"> Menu Form </h1>
<div id="text">
<?php
	//display employee name, shopname and shopid
        session_start();
	$empname = $_SESSION['empname']; $shopname = $_SESSION['shopname']; $shopid = $_SESSION['shopid'];
        echo("Name: ".$empname."<br>"."Shop: ".$shopname." (ID:".$shopid.")");
?>
</div>
<form method="POST" action="MenuController.php">
<br><input type="submit" id="button" name="loan" value="Loan Film">             
<input type="submit" id="button" name="return" value="Return Film">
<br><input type="submit" id="button" name="sales" value="Sales Figures">        
<input type="submit" id="button" name="logout" value="Log out">

</form>
</div>
</body>
</html>
