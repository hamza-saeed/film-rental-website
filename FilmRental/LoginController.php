<?php
include ("LoginModel.php");

//validates the input. If passes, call LogIn method. If not, error message
if(isset($_POST['submit'])) {
	if ($_POST['NIN'] == '') {
			session_start();
			$_SESSION['loginMessage'] = "Please input the NIN!";
			header('Location: https://selene.hud.ac.uk/u1550400/FilmRental/LoginForm.php');
		}
	else {
		LogIn();
	}
}

//checks if entered NIN is correct. If so, take to menu form. If not, error message. 
function LogIn() {
	session_start();
	$model = new LoginModel();
	$res = $model->getLogin();
	if ($res == true) {
		include ("MenuModel.php");
		$model = new MenuModel(); $model->getDetails();
		header('Location: https://selene.hud.ac.uk/u1550400/FilmRental/MenuForm.php');
	}
	else {
		$_SESSION['loginMessage'] = "Incorrect NIN. Please try again!";
		header('Location: https://selene.hud.ac.uk/u1550400/FilmRental/LoginForm.php');
	}
	
}



?>