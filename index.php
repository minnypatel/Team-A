<?php

include_once 'Controller/display.php';
include_once 'Model/dummy-data.php';
include_once 'Model/Dbconnection.php';

use function Controller\display;

/*try {
    $newThing = new Dbconnection(); 
    $newThing->getdbconnect();
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
    
$stmt = $newThing->prepare("SELECT * FROM article");
$stmt->execute();

echo "This printed\n";
echo $stmt;*/

?>

<html>
    <head>
        <title>Homepage</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">
         <script async src='JS/newjavascript.js'></script>
    </head>
    <body>
        <?php // include "Views/navbar.phtml"; ?>
        <?php echo display('navbar') ; ?>
        <div class="container">
        <div class="main">
            <?php echo display('article', ['articles' => $articles, 'articleID' => 'Article 1' ] ); ?>
            <?php echo display('article', ['articles' => $articles, 'articleID' => 'Article 2' ] ); ?>
            <a class="twitter-timeline" data-width="300" data-height="500" data-theme="dark" data-link-color="#9266CC" href="https://twitter.com/SkySports">Tweets by SkySports</a>
        </div>
        </div>
       
         <script src='https://platform.twitter.com/widgets.js' async></script>
    </body>
</html>

