<?php

include_once 'Controller/ContributorLogin.php';

session_start();

$contributorLogin = new \Controller\ContributorLogin;
$contributorLogin->logout();