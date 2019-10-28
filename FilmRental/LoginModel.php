<?php
include "LoginDAO.php";

class LoginModel {
      
 //calls method which returns NIN. If correct, returns true. if incorrect, returns false
 public function getLogin() {
					session_start();
					$DAO = new LoginDAO();
					$row = $DAO->loginDetails();
					if(!empty($row['empnin'])) {
										$_SESSION['empnin'] = $row['empnin'];
										return true;
				 }
					else	{
								 return false;
					}
	}
 
 }
?>
