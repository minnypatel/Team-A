<?php

include_once 'Model/Dbconnection.php';
include_once 'Model/Article.php';
include_once 'Model/ArticleDAO.php';

use Model\ArticleDAO;
use Model\Dbconnection;

echo "This printed";
$articleDisplay = new ArticleDAO(Dbconnection::getInstance());
echo "This printed2";
print_r($articleDisplay->getAll());
echo "This printed3";