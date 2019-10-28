<?php

//if return button pressed, validate inputs. If passes, call method from model. If not, error message.
if(isset($_POST['return'])) {
	if ($_POST['dvdID'] == "") {
		session_start();
		$_SESSION['returnMessage'] = 'Please input values for all fields';
		header('Location: https://selene.hud.ac.uk/u1550400/FilmRental/ReturnForm.php');
	}
	else {
	include ("ReturnModel.php");
	$model = new ReturnModel();
	$model->getCustomer();
	header('Location: https://selene.hud.ac.uk/u1550400/FilmRental/ReturnForm.php');
	}
	
}

//if back button pressed, return to previous page.
if(isset($_POST['back'])) {
	session_start();
	$_SESSION['returnMessage'] = '';
	header('Location: https://selene.hud.ac.uk/u1550400/FilmRental/MenuForm.php');
}

?>