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
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Neuton" rel="stylesheet">
    </head>
    
    
    <body>
        <?php echo display('navbar'); ?>
        <div class="container">
            <div class="main">


            <?php if($_SESSION) {
                      $contributorConstruction = new ContributorDAO(Dbconnection::getInstance());
                      $loggedOn = $contributorConstruction->buildContributorObject($_SESSION['username']);
                      echo '<div class="welcome">' . "Hi, " . $loggedOn->getFirstName() . " " . $loggedOn->getLastName() . '!</div>';
                  }
                  $get = filter_input(INPUT_GET, 'category', FILTER_SANITIZE_STRING);
                  if(isset($get)) {
                      echo '<div class="category">' . $get . '</div>';
                  } 
            ?>

                <div class="row">
                    <div class="eight columns">


        <?php  
            if(isset($get)) {
                $articleDisplay = new ArticleDAO(Dbconnection::getInstance());
                $array = $articleDisplay->getCategory($get);
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
                           
                        <div id="twitterbox">
                            
                            <a class="twitter-timeline" data-width="300" href="https://twitter.com/HipsterHacker">Tweets by HipsterHacker</a>
                        
                        </div>
                    </div>
                </div>
   
            
            <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
 </div>
        
    </body>
       <?php echo display('footer'); ?>
</html>

