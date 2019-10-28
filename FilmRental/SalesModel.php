<?php
include "SalesDAO.php";

class SalesModel
{
    //calls method to get the total sales
    public function getTotal() {
        session_start();
        $DAO = new SalesDAO();
        $row = $DAO->retrieveSales();
        if ($row['DailyTotal'] === null) {
            $_SESSION['DailyTotal'] = '0.00';
        }
        else {
            $_SESSION['DailyTotal'] = $row['DailyTotal'];
        }
        return $shopid;
    }
}