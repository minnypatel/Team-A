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

if(!isset($_SESSION['username'])) {
    header("location:login.php");
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $article = new Article($_POST['title'], $_POST['content']);
    
    if(isset($_FILES['userFile'])) {
        $file = new File($_FILES['userFile']['name']);
        $file->setLocation($_FILES['userFile']['tmp_name']);
        $article->setImage($file);
     }
    
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
        <title>Upload</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">
        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
        <script type="text/javascript" src="JavaScript/validateForm.js"></script>
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