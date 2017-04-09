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

            $stmt = $connection->prepare("SELECT username, password
                                          FROM contributor
                                          WHERE username =:username AND password =:password");

            $stmt->execute([
                'username'   => $contributor->getUsername(), 
                'password' => $contributor->getPassword()
                ]);

            foreach($stmt as $contributor) {
                echo "This ran";
                if ($contributor['username'] == $username && $contributor['password'] == $password) {
                    $_SESSION['username'] = $username;
                    var_dump('I was hit');
                    header("Location: index.php");
                }
            }

            // hack for a failed login. foreach won't run without data so can't use the else branch
            echo "login failed";
        }
    }
}