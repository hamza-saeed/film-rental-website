<?php
include "MenuDAO.php";

class MenuModel {
    //calls method to get shop and employee details
    public function getDetails() {
        session_start();
        $_SESSION['loginMessage'] = "";
        $DAO = new MenuDAO();
        $row = $DAO->getDetails();
        $_SESSION['empname'] = $row['empname'];
        $_SESSION['shopname'] = $row['shopname'];
        $_SESSION['shopid'] = $row['shopid'];
    }
}