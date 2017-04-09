<?php 

include_once 'Controller/display.php';
include_once 'Controller/ContributorLogin.php';
include_once 'Model/Contributor.php';
include_once 'Controller/ContributorSignup.php';

use Model\Contributor;
use function Controller\display;

?>
<?php

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $contributor = new Contributor($_POST['username'], $_POST['password']);
    $contributor->setFirstName($_POST['firstname']);
    $contributor->setLastName($_POST['lastname']);
    $contributor->setEmail($_POST['emailaddress']);
    $contributorSignup = new Controller\ContributorSignup();
    $contributorSignup->signup($contributor);
}

?>

<html>
    <head>        
        <title>Sign Up</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="CSS/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Slab" rel="stylesheet">
    </head>
    <body>
        <?php echo display('navbar'); ?>
        <div class="container">
        <div class="main">
              <?php echo display('signupform'); ?>
        </div>
        </div>
    </body>
</html>