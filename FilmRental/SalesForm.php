<html>
<head>
<title>Sales Figures Form</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id = "body">
<div id ="textborder">
<h1 id="text"> Sales Figures Form </h1>
<div id=text>
<?php
	//displays daily total sales
	session_start();
	$row['DailyTotal'] = $_SESSION['DailyTotal'];
	echo "The Daily Total Sales is £ ".$row['DailyTotal'];
?>
</div>
<form method="POST" action="SalesController.php">
<br><input type="submit" id="button" name="sales" value="Refresh Daily Sales Figures">
<input type="submit" id="button" name="back" value="Back">
</div>
</body>
</html>
