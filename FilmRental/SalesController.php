<?php
//go to previous page
if(isset($_POST['back']))
{
	header('Location: https://selene.hud.ac.uk/u1550400/FilmRental/MenuForm.php');
}

//refresh page
if(isset($_POST['sales']))
{
	header('Location: https://selene.hud.ac.uk/u1550400/FilmRental/SalesForm.php');
}



?>