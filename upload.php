<?php

include_once 'Controller/display.php';
include_once 'Controller/ArticleUpload.php';
include_once 'Model/DbConnection.php';
include_once 'Model/Article.php';
include_once 'Model/File.php';

use \Model\Article;
use \Model\File;

use function Controller\display;

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
     $article = new Article($_POST['title'], $_POST['content']);
     
        if (!empty($_FILES['userFile']['name'])) {
            $file = new File($_FILES['userFile']['name']);
            $file->setLocation($_FILES['userFile']['tmp_name']);
            $article->setImage($file);
            }
        
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