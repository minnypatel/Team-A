<?php

namespace Controller;

include_once 'Model/DbConnection.php';
include_once 'Model/ContributorDAO.php';
include_once 'Model/Contributor.php';

use \Model\DbConnection;
use \Model\ContributorDAO;
use \Model\Contributor;

Class ContributorSignup
{    
    public function signup($contributor) {
        
        $contributorNew = new ContributorDAO(Dbconnection::getInstance());
        $contributorNew->contributorSignup($contributor);
//        header("Location: login.php");

        }
    }