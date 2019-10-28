<?php
include "ReturnDAO.php";

class ReturnModel {
	
    //method to get details of customer from DVD.
    public function getCustomer() {
        session_start();
        $DAO = new ReturnDAO();
		$row = $DAO->retrieveCustomerDetails();
		$shopid = $row['shopid'];
		$customerid = $row['custid'];
		$GLOBALS['customerid'] = $customerid;
        $rentalStatus = $row['rstatusid'];
		//validates return status
	    if (($rentalStatus == '2') || ($rentalStatus === NULL)) {
            $_SESSION['returnMessage'] = 'The DVD entered is not currently on loan!';
        }
		else if ($shopid != $_SESSION['shopid']) {
			$_SESSION['returnMessage'] = 'The DVD must be returned to the same store that it was rented at!';
		}
        else {
            $this->returnDVD();    
        }        
    }
    
	//calls method to update table to show return
    public function returnDVD() {
            session_start();
			$DAO = new ReturnDAO();
			$DAO->updateTable();
            $_SESSION['returnMessage'] = 'DVD has now been returned.'; 
    }
    
}
?>