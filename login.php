<?php 

include_once 'Controller/display.php';
include_once 'Controller/ContributorLogin.php';
include_once 'Model/Contributor.php';

use Model\Contributor;
use function Controller\display;

?>
<?php

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $contributor = new Contributor($_POST['username']);
    $contributor->setPassword($_POST['password']);
    $contributorLogin = new Controller\ContributorLogin();
    $contributorLogin->login($contributor);
}

?>


<html>
    <head>        
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">
        <script type="text/javascript" src="JavaScript/validateForm.js"></script>
    </head>
    <body>
        <?php echo display('navbar'); ?>
        <div class="container">
        <div class="main">
              <?php echo display('loginform'); ?>
        </div>
        </div>
    </body>
</html>