<?php


include_once 'Controller/display.php';
include_once 'Model/dummy-data.php';
include_once 'Model/DbConnection.php';

use function Controller\display;


/* 
 $newConnection = new DbConnection(); 
$newConnection = $newConnection->getDb(); // here you get the connection
 */


    
$stmt = $newConnection->prepare("SELECT id, title FROM article");
$stmt->execute();

echo "This printed\n";
print_r($stmt);

foreach ($stmt as $row) {
	echo $row[0] . " " . $row[1] . "<br>";
}

echo "********************" . "<br>";

//$newArticle = new ;
