<?php

namespace Controller\Articleupload;

$title = $body = $image = "";

function upload_file(){
    
$title = $_POST['title'];
$body = $_POST ['body'];
$image = $_FILES ['image'];
//echo "Hello " . $title . $body . $image['tmp_name'];

$destinationFile = getcwd().'/Images/'.$image['name'];
move_uploaded_file($image['tmp_name'], $destinationFile);

//header("Location: index.php" );

return $image['name'];
}
?>


<!--  return $_GET["title"];
      return $_GET["body"]; Cant have 2 returns in a function. This actually needs to be passed to our database. We could assign the values to a variable and then echo the variable. -->