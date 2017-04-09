<?php

namespace Controller;

use \Model\DbConnection;

Class ContributorSignup {
    
    public function signup($contributor) {

            $instance = DbConnection::getInstance();
            $connection = $instance->getConnection();

             $stmt = $connection->prepare("INSERT INTO contributor (username, firstname, lastname, email, password)
                                           VALUES (:username, :firstname, :lastname, :email, :password)");

            $stmt->execute([
                'username'  => $contributor->getUsername(),
                'firstname' => $contributor->getFirstName(),
                'lastname'  => $contributor->getLastName(),
                'email'     => $contributor->getEmail(),
                'password'  => $contributor->getPassword()          
                ]);
            
            $_SESSION['username']  = $contributor->getUsername();
            $_SESSION['firstname'] = $contributor->getFirstName();
            $_SESSION['lastname']  = $contributor->getLastName();
            
            header("Location: index.php");
        }
    }