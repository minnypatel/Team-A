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
        
        try {
        $contributorLogger->contributorCheckLogin($contributor);
        header("Location: index.php");
        }
        catch (\PDOException $e) {
            echo "Error - Login failed";
        }
        catch (\Exception $e) {
            echo "Error - Login failed";
        }
    }
    
    public function logout() {
        $_SESSION = array();
        session_destroy();
        header("location:index.php");
    }
}