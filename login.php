<?php 
include_once 'Model/dummy-data.php';
include_once 'Controller/display.php';
include_once 'Controller/authentication.php';

?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    Controller\Authentication\login($_POST['username'], $_POST['password']);
}
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
        <?php // include "Views/navbar.phtml"; ?>
        <?php //echo display('navbar');
        echo Controller\display('loginform');?>
        <div class="container">
        <div class="main">
        </div>
        </div>
    </body>
</html>