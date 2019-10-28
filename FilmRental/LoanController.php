<?php

//When back button pressed, clear message and navigate to previous page
if(isset($_POST['back']))
{
	session_start();
	$_SESSION['loanMessage'] = '';
	header('Location: https://selene.hud.ac.uk/u1550400/FilmRental/MenuForm.php');
}

//When loan button pressed, validate and if passed, call method from model
if(isset($_POST['loan']))
{
	if (($_POST['dvdid']) == "" || ($_POST['custid']) == "")
	{
		session_start();
		$_SESSION['loanMessage'] = 'Please input values for all fields';
		header('Location: https://selene.hud.ac.uk/u1550400/FilmRental/LoanForm.php');
	}
	else
	{
		include ("LoanModel.php");
		$model = new LoanModel();
		$model->checkShop();
	}
}


?>