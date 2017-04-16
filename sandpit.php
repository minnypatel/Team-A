<?php

include_once 'Model/DbConnection.php';
include_once 'Model/Article.php';
include_once 'Model/ArticleDAO.php';

use Model\ArticleDAO;
use Model\DbConnection;

echo "This printed";
$articleDisplay = new ArticleDAO(DbConnection::getInstance());
echo "This printed2";
print_r($articleDisplay->getAll("Humblebrag"));
echo "This printed3";