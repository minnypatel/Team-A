<?php

namespace Controller;

include_once 'Model/DbConnection.php';
include_once 'Model/ContributorDAO.php';
include_once 'Model/Contributor.php';

use \Model\DbConnection;
use \Model\ContributorDAO;
use \Model\Contributor;

Class ContributorLogin
{    
    public function login($contributor) {
        
        $contributorLogger = new ContributorDAO(Dbconnection::getInstance());
        $contributorLogger->contributorCheckLogin($contributor);
        // hack doesn't work, better to write into a try catch in the DAO
//        echo "login failed";
//        header("Location: index.php");
    }
    
    public function logout() {
        $_SESSION = array();
        session_destroy();
        header("location:index.php");
    }
}