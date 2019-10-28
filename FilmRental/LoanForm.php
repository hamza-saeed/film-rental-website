<html>
<head>
<title>Loan Movie Form</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id = "body">
<div id ="textborder">
<h1 id="text"> Loan Movie Form </h1>
<form method="POST" action="LoanController.php">
<h2 id="text">Enter DVD ID: <br><input type="text" name="dvdid" size="15"></h2>
<h2 id="text">Enter Customer ID: <br><input type="text" name="custid" size="15"></h2>
<h2 id="text">Enter Payment Method: <br> </h2>
  <select name="payment">
  <option value="1">Cash</option>
  <option value="2">Cheque</option>
  <option value="3">Debit Card</option>
  <option value="4">Credit Card</option>
</select>
<br>
<br><input type="submit" id="button" name="loan" value="Loan">
<input type="submit" id="button" name="back" value="Back"><br> <br>
<div id="text"> 
<?php
    session_start();
    //display message
    $message = $_SESSION['loanMessage'];
    echo $message;
?>
</div>
</div>
</body>
</html>
