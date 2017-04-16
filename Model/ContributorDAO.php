<?php

namespace Model;

include_once 'DbConnection.php';
include_once 'File.php';

use \Model\DbConnection;
use \Model\File;

Class ContributorDAO
{
    protected $connection;
    
    public function __construct(DbConnection $connection) {
        $this->connection = $connection;
    }
    
    public function contributorCheckLogin($contributor) {
        
        // try/catch all of this to create failed login?
        
        $request = $this->connection->prepare("SELECT id, username, password, firstname, lastname
                                      FROM contributor
                                      WHERE username =:username AND password =:password");

        $request->execute([
            'username'   => $contributor->getUsername(), 
            'password'   => $contributor->getPassword()
            ]);
        
        foreach($request as $details) {
            if ($details['username'] == $contributor->getUsername() 
             && $details['password'] == $contributor->getPassword()) {
                    $_SESSION['username']  = $details['username'];
            }
        }
    }
    
    public function build($username) {
        
        $request = $this->connection->prepare("SELECT id, firstname, lastname, email
                                      FROM contributor
                                      WHERE username =:username");

        $request->execute([
            'username'   => $username
            ]);
        
        foreach($request as $details) {
            $_SESSION['id']         = $details['id'];
            $_SESSION['firstname']  = $details['firstname'];
            $_SESSION['lastname']   = $details['lastname'];
            $_SESSION['email']      = $details['email'];   
        }
    }
    
    public function contributorSignup($contributor) {

        $request = $this->connection->prepare("INSERT INTO contributor (username, firstname, lastname, email, password)
                                               VALUES (:username, :firstname, :lastname, :email, :password)");

        $request->execute([
            'username'  => $contributor->getUsername(),
            'firstname' => $contributor->getFirstName(),
            'lastname'  => $contributor->getLastName(),
            'email'     => $contributor->getEmail(),
            'password'  => $contributor->getPassword()]);
    }
}