<?php

include_once 'Controller/display.php';
include_once 'Model/DbConnection.php';
include_once 'Model/Article.php';
include_once 'Model/ArticleDAO.php';
include_once 'Model/ContributorDAO.php';

use Model\ArticleDAO;
use Model\ContributorDAO;
use Model\DbConnection;
use Model\Article;

use function Controller\display;

session_start();

?>

<html>
    <head>
        <title>HOW</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/skeleton.css">
        <link rel="stylesheet" href="CSS/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Judson|Quando" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cabin|Lobster|Lora|Patua+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Grand+Hotel" rel="stylesheet">
    </head>
    
    
    <body>
        <?php echo display('navbar'); ?>
        <div class="container">
            <div class="main">

                    <?php if($_SESSION) {
                    $contributorConstruction = new ContributorDAO(Dbconnection::getInstance());
                    $loggedOn = $contributorConstruction->buildContributorObject($_SESSION['username']);
                    echo '<h3 class="welcome">' . "Welcome: " . $loggedOn->getFirstName() . " " . $loggedOn->getLastName() . '</h3>';
                  }
                  if($_GET) {
                    echo '<h3 class="category">' .  $_GET['category'] . '</h3>';
                  } 
            ?>

                <div class="row">
                    <div class="eight columns">


        <?php
            $var = filter_input(INPUT_GET, 'category');    
            if(isset($var)) {
                $articleDisplay = new ArticleDAO(Dbconnection::getInstance());
                $array = $articleDisplay->getCategory($var);
            } else {
                $articleDisplay = new ArticleDAO(Dbconnection::getInstance());
                $array = $articleDisplay->getAll();
            }
            $array = array_reverse($array);
            
            foreach($array as $article) {
                
                $authorConstruction = new ContributorDAO(Dbconnection::getInstance());
                $articleAuthorUsername = $article->getContributor()->getUsername();
                $articleAuthor = $authorConstruction->buildContributorObject($articleAuthorUsername);
                $article->setContributor($articleAuthor);
                
                echo display('article', 
                            ['title'       => $article->getTitle(),
                             'filepath'    => $article->getImage()->getLocation(),
                             'content'     => $article->getContent(),
                             'category'    => $article->getCategory(),
                             'date'        => date("jS F Y", filemtime($article->getImage()->getLocation())),
                             'contributor' => $article->getContributor()->getFirstName()
                                            . " "
                                            . $article->getContributor()->getLastName()
                            ]);
            }
            
            ?>
                  </div>        
                           
                        <div class="four columns" id="twitterbox">
                            
                            <a class="twitter-timeline" data-width="300" data-height="700" href="https://twitter.com/HipsterHacker">Tweets by HipsterHacker</a>
                        
                        </div>
                    </div>
                </div>
    </div>
            
            <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

    </body>
        <?php echo display('footer'); ?>
</html>

