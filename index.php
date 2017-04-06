<?php

include_once 'Controller/display.php';
include_once 'Model/dummy-data.php';
include_once 'Model/Dbconnection.php';

use function Controller\display;

?>

<html>
    <head>
        <title>Homepage</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">
    </head>
    <body>
        <?php echo display('navbar') ; ?>
        <div class="container">
        <div class="main">
            <?php echo display('article', ['articles' => $articles, 'articleID' => 'Article 1' ] ); ?>
            <?php echo display('article', ['articles' => $articles, 'articleID' => 'Article 2' ] ); ?>

            <!-- We would need to do a loop or something to fetch all articles from the database to now display on homepage -->

        </div>
        </div>
    </body>
</html>

