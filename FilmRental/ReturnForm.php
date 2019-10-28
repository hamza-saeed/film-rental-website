<html>
<head>
<title>Return Movie Form</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id = "body">
<div id ="textborder">
<h1 id="text"> Return Movie Form </h1>
<form method="POST" action="ReturnController.php">
<h2 id="text">Enter DVD ID: <br><input type="text" name="dvdID" size="15"></h2>
<input type="submit" id="button" name="return" value="Return DVD">   
<input type="submit" id="button" name="back" value="Back"><br><br>
<div id="text">
<?php
    //displays message
    session_start();
    $message = $_SESSION['returnMessage'];
    echo $message;
?>
</div>
</div>
</body>
</html>
