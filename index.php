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
        <title>Homepage</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                             'date' => date("jS F Y", filemtime($thing->getImage()->getLocation()))
                            ]);
            }
            
            ?>
                    
        </div>
        </div>
    </body>
        <?php echo display('footer'); ?>
</html>

