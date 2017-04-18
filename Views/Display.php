<?php

namespace Views;

include_once 'Controller/ContributorDAO.php';

use \Controlee\ContributorDAO;



Class Display 
{
    public function displayLoggedIn() {
        if($_SESSION) {
            $contributorConstruction = new ContributorDAO(Dbconnection::getInstance());
            $loggedIn = $contributorConstruction->buildContributorObject($_SESSION['username']);
            return $loggedIn;
        }
        
    }
}