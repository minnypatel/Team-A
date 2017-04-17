<?php

include_once 'Controller/display.php';
include_once 'Controller/ArticleUpload.php';
include_once 'Model/DbConnection.php';
include_once 'Model/Article.php';
include_once 'Model/File.php';
include_once 'Model/ContributorDAO.php';

use \Model\Article;
use \Model\ContributorDAO;
use \Model\File;
use \Model\DbConnection;

use function Controller\display;

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $file = new File($_FILES['userFile']['name']);
    $file->setLocation($_FILES['userFile']['tmp_name']);
    
    $article = new Article($_POST['title'], $_POST['content']);
    
    $article->setImage($file);
    
    $contributorConstruction = new ContributorDAO(Dbconnection::getInstance());
    $contributor = $contributorConstruction->buildContributorObject($_SESSION['username']);
    
    $article->setContributor($contributor);
    
    $article->setCategory($_POST['category']);
    
    $articleUpload = new Controller\ArticleUpload();
    $articleUpload->upload($article);
}

?>

<html>
    <head>
        
        <link rel="stylesheet" href="CSS/skeleton.css">
        <link rel="stylesheet" href="CSS/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat|Neuton" rel="stylesheet">
        
        <title>Upload</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">
    </head>
    <body>
        
        <?php echo display('navbar'); ?>
        
        <div class="container">
          <div class="main">
            
        <?php echo display('uploadform');?>
        <!--Article Title: <?php // echo $_GET["title"]; ?><br>-->
        <!--Article Body:--> <?php // echo $_GET["body"]; ?>
          </div>
        </div>
        
    </body>
</html>