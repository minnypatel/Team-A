<?php

namespace Controller\Authentication;

//include_once 'Model\dummy-data.php';
//include_once 'Model\userdetails.php';

function login($username, $password) {
    //$user = \Model\Userdetails\read_user($users, $username, $password);

//    if($user && password_verify($password, $user['password'])) {
        
//        header(‘Location: upload.php’);

    if ($username == "amardeep" && $password == "test"){
            $_SESSION['username'] = $username;
            var_dump('I was hit');
//            header("Location: index.php");
            //print_r($_SESSION);  
    } else {
        die("ERROR - login failed");
    }
    
    
    
}

//function logout() {
//    session_destroy();
//}

//function require_login() {
//    if(empty($_SESSION[‘username’])) {
//        header(‘Location: login.php’);
//        exit();
//    }

//}
?>