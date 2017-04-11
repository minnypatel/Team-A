<?php

namespace Controller;

use \Model\DbConnection;

Class ContributorLogin {
    
    public function login($contributor) {
        
        if(isset($_POST["username"], $_POST["password"])) {     

            $username = $contributor->getUsername(); 
            $password = $contributor->getPassword();

            $instance = DbConnection::getInstance();
            $connection = $instance->getConnection();

            $stmt = $connection->prepare("SELECT username, password, firstname, lastname
                                          FROM contributor
                                          WHERE username =:username AND password =:password");

            $stmt->execute([
                'username'   => $username, 
                'password' => $password
                ]);

            foreach($stmt as $details) {
                echo "This ran";
                if ($details['username'] == $username && $details['password'] == $password) {
                    $contributor->setFirstName($details['firstname']);
                    $contributor->setLastName($details['lastname']);
                    $_SESSION['username']  = $username;
                    $_SESSION['firstname'] = $details['firstname'];
                    $_SESSION['lastname']  = $details['lastname'];
                    header("Location: index.php");
                }
            }

            // hack for a failed login. foreach won't run without data so can't use the else branch
            echo "login failed";
        }
    }
    
    public function logout() {
        $_SESSION = array();
        session_destroy();
        header("location:index.php");
    }
}