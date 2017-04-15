<?php

include_once 'Controller/display.php';
include_once 'Model/DbConnection.php';
include_once 'Model/Article.php';
include_once 'Model/ArticleDAO.php';

use Model\ArticleDAO;
use Model\DbConnection;
use Model\Article;

use function Controller\display;

session_start();

?>

<html>
    <head>
        <title>HOW home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">
    </head>
    <body>
        <?php echo display('navbar'); ?>
        <div class="container">
        <div class="main">
            <?php if($_SESSION): ?>
                    <p>Welcome: <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></p>
            <?php endif; ?>
            
        <?php
            
            $articleDisplay = new ArticleDAO(Dbconnection::getInstance());
            $array = $articleDisplay->getAll();
            $array = array_reverse($array);
   
            foreach($array as $thing) {
                echo display('article', 
                            ['title' => $thing->getTitle(),
                             'filepath' => $thing->getImage()->getLocation(),
                             'content' => $thing->getContent(),
                             'category' => $thing->getCategory(),
                             'date' => date("jS F Y", filemtime($thing->getImage()->getLocation()))
                            ]);
            }
            
            ?>

        </div>
        </div>
    </body>
</html>

