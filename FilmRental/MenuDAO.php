<?php
require_once('config.php');
class MenuDAO {
    //initialises PBO in constructor
    function __construct() {
        $GLOBALS['db'] = new PDO(DB_DATA_SOURCE, DB_USERNAME, DB_PASSWORD);    
    }
    
    //runs SQL query to get employee name, shopname and shopid. Returns result
    public function getDetails() {
        session_start();
        $nin = $_SESSION['empnin'];
        $query = $GLOBALS['db']->query("SELECT e.empname,s.shopname,s.shopid
                                        FROM frs_Employee e
                                        LEFT JOIN (SELECT shopname,shopid FROM frs_Shop) AS s
                                        ON s.shopid = e.shopid WHERE empnin = '$nin'");
        $row=$query->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

}



?>