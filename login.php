<?php 

include_once 'Controller/display.php';
include_once 'Controller/ContributorLogin.php';
include_once 'Model/Contributor.php';

use Model\Contributor;
use function Controller\display;

?>
<?php

session_start();

$server = filter_input_array(INPUT_SERVER, FILTER_SANITIZE_STRING);
$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if($server['REQUEST_METHOD'] == 'POST') {
    $contributor = new Contributor($post['username']);
    $contributor->setPassword($post['password']);
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