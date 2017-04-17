<?php

include_once 'Controller/display.php';
include_once 'Model/Dbconnection.php';
include_once 'Model/Article.php';
include_once 'Model/ArticleDAO.php';

use Model\ArticleDAO;
use Model\Dbconnection;
use Model\Article; 

use function Controller\display;

session_start();

?>

<html>
    <head>
        <title>Homepage</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/skeleton.css">
        <link rel="stylesheet" href="CSS/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Judson|Quando" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cabin|Lobster|Lora|Patua+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Grand+Hotel" rel="stylesheet">
    </head>
    
    
    <body>
        <?php echo display('navbar'); ?>
        <div class="container">
            <div class="main">

                    <?php if($_SESSION): ?>
                            <p>Welcome: <?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname'];?></p>
                    <?php endif; ?>

                <div class="row">
                    <div class="eight columns">


                        <?php

                        $articleDisplay = new ArticleDAO(Dbconnection::getInstance());
                        $array = $articleDisplay->getAll();
                        $array = array_reverse($array); 

                        foreach($array as $thing) {
                            echo display('article', ['title' => $thing->getTitle(), 'filepath' => $thing->getImage()->getLocation(), 'content' => $thing->getContent(), 'date' => date("jS F Y", filemtime($thing->getImage()->getLocation()))]);
                        }
                        ?>
                           
                        <div class="four columns" id="twitterbox">
                            
                            <a class="twitter-timeline" data-width="300" data-height="700" href="https://twitter.com/HipsterHacker">Tweets by HipsterHacker</a>
                        
                        </div>
                    </div>
                </div>
            </div>
    </div>
            
            <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
    </body>
</html>

