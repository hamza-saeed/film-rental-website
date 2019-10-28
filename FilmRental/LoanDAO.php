<?php
require_once('config.php');
class LoanDAO
{
	//initialise PBO in constructor
    function __construct() {
        $GLOBALS['db'] = new PDO(DB_DATA_SOURCE, DB_USERNAME, DB_PASSWORD);
    }
	
    //returns details on shop
    public function returnShop() {
        session_start();
        $query = $GLOBALS['db']->query("SELECT shopid FROM frs_DVD WHERE dvdid ='$_POST[dvdid]'");
        $row=$query->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
	
    //returns details on stock of dvd
    public function returnStock(){
        session_start();
        $query = $GLOBALS['db']->query("SELECT d.dvdid, rstatusid, d.shopid FROM frs_DVD AS d
		LEFT JOIN (SELECT * FROM frs_FilmRental) As fr
		ON (fr.dvdid = d.dvdid) AND (fr.shopid = d.shopid)
		WHERE d.dvdid = '$_POST[dvdid]'");
        $row=$query->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
	
	//deletes rental from table
	public function deleteRental() {
		$GLOBALS['db']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "DELETE FROM frs_FilmRental WHERE dvdid = '$_POST[dvdid]'";
		$GLOBALS['db']->exec($sql);
	}
    
	//adds rental and payment to tables
    public function addRentalPayment() {
        session_start();
        $query = $GLOBALS['db']->query("SELECT MAX(payid) FROM frs_Payment");
        $row=$query->fetch(PDO::FETCH_ASSOC);
    	$payID = $row['MAX(payid)'] + 1;				
    	$shopid = $_SESSION['shopid'];
    	$empnin = $_SESSION['empnin'];
    	$duedate = strtotime("+7 day");
    	$cost = 3.99;
    	$paymentMethod = $_POST['payment'];
    	$sql = "INSERT INTO `u1550400`.`frs_Payment` (`payid`, `amount`, `paydatetime`, `empnin`, `custid`, `pstatusid`, `ptid`)
    	VALUES ('$payID', '$cost', CURRENT_TIMESTAMP, '$empnin', '$_POST[custid]', '1', '$paymentMethod');";
    	$query1 = $GLOBALS['db']->prepare($sql);
    	$query1->execute();
    	$query2 = $GLOBALS['db']->query("SELECT filmid FROM frs_DVD WHERE dvdid = '$_POST[dvdid]'");
    	$row1=$query2->fetch(PDO::FETCH_ASSOC);
    	$movieid = $row1['filmid'];
    	$sql1 = "INSERT INTO `u1550400`.`frs_FilmRental`
            	(`dvdid`, `filmid`, `shopid`, `retdatetime`, `duedate`,`overduecharge`, `empnin`, `custid`, `rentalrate`, `payid`, `rstatusid`) VALUES
            	('$_POST[dvdid]', '$movieid', '$shopid', '0000-00-00', DATE_ADD(NOW(), INTERVAL 7 DAY), '0.00', '$empnin', '$_POST[custid]', '$cost', '$payID', '1')";
    	$query3 = $GLOBALS['db']->prepare($sql1);
    	$query3->execute();
        
    }
    
}

?>