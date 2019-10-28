<?php
require_once('config.php');
class LoginDAO
{    
    //initialise PBO in constructor
	function __construct() {
        $GLOBALS['db'] = new PDO(DB_DATA_SOURCE, DB_USERNAME, DB_PASSWORD);    
    }
    
	//runs SQL query to get NIN and returns result.
    public function loginDetails()   {
		$query = $GLOBALS['db']->query("SELECT * FROM frs_Employee WHERE empnin = '$_POST[NIN]'");
		$row=$query->fetch(PDO::FETCH_ASSOC);
        return $row;
    }
    
}
?>