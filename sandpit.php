<?php

include_once 'Model/DbConnection.php';

$instance = Dbconnection::getInstance();
$connection = $instance->getConnection(); 
var_dump($connection);
    
$stmt = $connection->prepare("SELECT id, title FROM article");
$stmt->execute();

echo "This printed\n";
print_r($stmt);

foreach ($stmt as $row) {
	echo $row[0] . " " . $row[1] . "<br>";
}

echo "********************" . "<br>";

//$newArticle = new ;