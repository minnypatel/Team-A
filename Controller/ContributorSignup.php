<?php

namespace Controller;

use \Model\Dbconnection;

Class ContributorSignup {
    
    public function signup($contributor) {
        
        //if(isset($_POST["username"], $_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["password"])) {     
            
            $username = $contributor->getUsername(); 
            $firstName = $contributor->getFirstName(); 
            $lastName = $contributor->getLastName();
            $email = $contributor->getEmail(); 
            $password = $contributor->getPassword();

            $instance = Dbconnection::getInstance();
            $connection = $instance->getConnection();

             $stmt = $connection->prepare("INSERT INTO contributor (username, firstname, lastname, email, password)
                                           VALUES (:username, :firstname, :lastname, :email, :password)");

            $stmt->execute([
                'username'   => $username, 
                'firstname' => $firstName,
                'lastname' => $lastName,
                'email' => $email,
                'password' => $password          
                ]);
            
            $_SESSION['username'] = $username;
            $_SESSION['firstname'] = $firstName;
            $_SESSION['lastname'] = $lastName;
            
            header("Location: index.php");
        }
    }
//}