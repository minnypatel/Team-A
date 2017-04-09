<?php

namespace Controller;

use \Model\Dbconnection;

Class ContributorLogin {
    
    public function login($contributor) {
        
        if(isset($_POST["username"], $_POST["password"])) {     

            $username = $contributor->getUsername(); 
            $password = $contributor->getPassword();

            $instance = Dbconnection::getInstance();
            $connection = $instance->getConnection();

            $stmt = $connection->prepare("SELECT username, password, firstname, lastname
                                          FROM contributor
                                          WHERE username =:username AND password =:password");

            $stmt->execute([
                'username'   => $contributor->getUsername(), 
                'password' => $contributor->getPassword()
                ]);

            foreach($stmt as $contributor) {
                echo "This ran";
                if ($contributor['username'] == $username && $contributor['password'] == $password) {
                    $firstName = $contributor['firstname'];
                    $lastName = $contributor['lastname'];
                    $_SESSION['username'] = $username;
                    $_SESSION['firstname'] = $firstName;
                    $_SESSION['lastname'] = $lastName;
                    header("Location: index.php");
                }
            }

            // hack for a failed login. foreach won't run without data so can't use the else branch
            echo "login failed";
        }
    }
}