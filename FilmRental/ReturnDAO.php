<?php
require_once('config.php');

Class ReturnDAO{
	
	//initialise PBO in constructor
    function __construct() {
        $GLOBALS['db'] = new PDO(DB_DATA_SOURCE, DB_USERNAME, DB_PASSWORD);
    }
    
    //runs SQL query to get customer details. Returns result
    public function retrieveCustomerDetails()
    {
        session_start();
        $query = $GLOBALS['db']->query("SELECT custid,rstatusid,shopid FROM frs_FilmRental WHERE dvdid ='$_POST[dvdID]'");
        $row=$query->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    
    //runs SQL query to update table.  
    public function updateTable()
    {
	$customerid = $GLOBALS['customerid'];
        $db = new PDO(DB_DATA_SOURCE, DB_USERNAME, DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE frs_FilmRental SET rstatusid='2',retdatetime=NOW() WHERE ((dvdid = '$_POST[dvdID]') AND (custid = '$customerid'))";
        $query = $db->prepare($sql);
        $query->execute();
    }
    
    
}