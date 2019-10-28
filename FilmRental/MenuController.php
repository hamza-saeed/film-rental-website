<?php

//takes user to appropriate page when they press the button

if(isset($_POST['loan'])) {
	header('Location: https://selene.hud.ac.uk/u1550400/FilmRental/LoanForm.php');
}
if(isset($_POST['return'])) {
	header('Location: https://selene.hud.ac.uk/u1550400/FilmRental/ReturnForm.php');
}
if(isset($_POST['sales'])) {
	//calculate total sales for today
	include ("SalesModel.php");
	$model = new SalesModel();
	$val = $model->getTotal();
	header('Location: https://selene.hud.ac.uk/u1550400/FilmRental/SalesForm.php');
}

//removes session if user logs out
if(isset($_POST['logout'])) {
	session_start();
	session_destroy();
	header('Location: https://selene.hud.ac.uk/u1550400/FilmRental/LoginForm.php');
}

?>