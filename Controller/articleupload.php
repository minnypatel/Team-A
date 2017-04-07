<?php

namespace Controller\Articleupload;

const InputKey = 'userFile';

$title = ""; 
$content  = "";
$image = "";


function upload_file() {

    $tmpFile = $_FILES[InputKey]['tmp_name'];
    $dstFile = 'Images/'.$_FILES[InputKey]['name'];

//    $instance = Dbconnection::getInstance();
//    $connection = $instance->getConnection();
    $servername = "mysql:host=127.0.0.1;dbname=blogdb";
    $username = "root";
    $password = "";
    
    $connection = new \PDO($servername, $username, $password);
    
    $stmt = $connection->prepare("INSERT INTO article (title, content, filepath)
                                  VALUES (:title, :content, :filepath)");

    $stmt->execute([
        'title'   => $_POST['title'], 
        'content' => $_POST['content'],
        'filepath' => $dstFile
        ]
    );
    
    echo "dstfile: $dstFile";
    
    if (!move_uploaded_file($tmpFile, $dstFile)) {
	throw new \Exception("Handle Error"); }

    if (file_exists($tmpFile)) {
        unlink($tmpFile);
    }
    
    echo "upload_file ran, bitches\n";
    print_r($_POST);
    
//    header("Location: index.php" );
}
    
    
    
//    keep this stuff
//    $image = $_FILES ['image'];
//    $destinationFile = getcwd().'/Images/'.$image['name'];
//    move_uploaded_file($image['tmp_name'], $destinationFile);
//
//    header("Location: index.php" );
//
//    return $image['name'];
