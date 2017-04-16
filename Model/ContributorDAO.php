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
            'password' => $contributor->getPassword()
            ]);
        
        // could the mapper function do this instead?
        foreach($request as $details) {
            if ($details['username'] == $contributor->getUsername() 
             && $details['password'] == $contributor->getPassword()) {
//                    $_SESSION['firstname'] = $details['firstname'];
//                    $_SESSION['lastname']  = $details['lastname'];
                    $_SESSION['id'] = $details['id'];
            }
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
    
    // add a function which takes care of setting $_SESSION
}