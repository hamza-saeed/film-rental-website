<?php
include "LoanDAO.php";

class LoanModel {

//checks if dvd entered is from current shop. If so, calls method to check stock. If not, error message
public function checkShop() {
	session_start();
	$DAO = new LoanDAO();
	$row = $DAO->returnShop();
	$shopid = $_SESSION['shopid'];
	if ($row['shopid'] == $shopid)
	{
		$this->checkStock();
	}
	else{
		$_SESSION['loanMessage'] = 'That DVD does not belong to this shop!';
		header('Location: https://selene.hud.ac.uk/u1550400/FilmRental/LoanForm.php');
	}
}

//checks if dvd entered has ever been rented before. If not, call method to add record. If it has
//and it has been returned since, the previous record is deleted and the new one is added.
//If it has not been returned since, show error message.
public function checkStock() {
	session_start();
	$DAO = new LoanDAO();
	$row = $DAO->returnStock();
	if ($row['rstatusid'] === NULL)
	{
		$this->addRecord();
	}
	else if ($row['rstatusid'] == '2')
	{
		$DAO = new LoanDAO();
		$DAO->deleteRental();
		$this->addRecord();
	}
	else
	{
		$_SESSION['loanMessage'] = 'That DVD is not currently in stock!';
		header('Location: https://selene.hud.ac.uk/u1550400/FilmRental/LoanForm.php');
	}
}

//calls method to add to rental/payment table
public function addRecord() {
		session_start();
		$DAO = new LoanDAO();
		$DAO->addRentalPayment();
		$_SESSION['loanMessage'] = 'Added Rental';
		header('Location: https://selene.hud.ac.uk/u1550400/FilmRental/LoanForm.php');
}      
}

?>