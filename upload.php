<?php

include_once 'Controller/display.php';
include 'Controller/articleupload.php';


use function Controller\display;
?>
<?php if($_SERVER['REQUEST_METHOD'] == 'POST'){
 $filename = Controller\Articleupload\upload_file();
}
?>
<html>
    <head>
        <title>Upload</title>
        <!-- <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet"> -->
    </head>
    <body>
       <!-- <div class="container">
        <div class="main">-->
            <?php // echo display('navbar'); ?>
            <?php echo display('uploadform');?>
        <!--Article Title: <?php // echo $_GET["title"]; ?><br>-->
        <!--Article Body:--> <?php // echo $_GET["body"]; ?>
        </div>
        </div>
        
        <img src="<?php echo 'Images/'.$filename; ?>" height='100' width='100' >
        <img src="Images/glass5.jpg" height='100' width='100' >
       
    </body>
</html>