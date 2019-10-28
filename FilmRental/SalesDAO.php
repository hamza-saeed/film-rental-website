<?php
require_once('config.php');
class SalesDAO
{
    //initialises PBO in constructor
    function __construct() {
        $GLOBALS['db'] = new PDO(DB_DATA_SOURCE, DB_USERNAME, DB_PASSWORD);    
    }
        //runs SQL query to retrieve sales information for today. Returns result
        public function retrieveSales() {
        session_start();
        $shopid = $_SESSION['shopid'];
        $nin = $_SESSION['empnin'];
        $query = $GLOBALS['db']->query("SELECT d.shopid, sum(amount) As DailyTotal
                            FROM frs_Payment p
                            LEFT JOIN(SELECT empnin, shopid FROM frs_Employee e) As d ON d.empnin = p.empnin
                            LEFT JOIN(SELECT shopid FROM frs_Shop s) As s on s.shopid = d.shopid
                            WHERE DATE(paydatetime) = DATE(NOW()) AND d.shopid = '$shopid'
                            GROUP BY d.shopid");
        $row=$query->fetch(PDO::FETCH_ASSOC);
        return $row;
        }

}
?>