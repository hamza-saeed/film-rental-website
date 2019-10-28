<html>
<head>
<title>Log in Form</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body id="body">
<div id ="textborder">
<h1 id="text">Log in</h1>
<form method="POST" action="LoginController.php">
<h2 id="text">Enter Staff NIN: <br><br><input type="text" name="NIN" size="15" required="required"></h2>
<br><input type="submit" id="button" name="submit" value="Login"><br><br>
<div id="text">
<?php
    //show error message (if applicable)
    session_start();
    $message = $_SESSION['loginMessage'];
    echo $message;
?>
</div>
</div>
</body>
</html> 