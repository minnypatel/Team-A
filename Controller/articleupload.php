<?php

namespace Controller\Articleupload;

$title = $body = $image = "";

function upload_file(){
    
$title = $_POST['title'];
$body = $_POST ['body'];
echo "Hello " . $title . $body;
header("Location: index.php" );
}
?>
<!--  return $_GET["title"];
      return $_GET["body"]; Cant have 2 returns in a function. This actually needs to be passed to our database. We could assign the values to a variable and then echo the variable. -->