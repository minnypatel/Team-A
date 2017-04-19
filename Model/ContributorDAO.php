<?php

namespace Model;

include_once 'DbConnection.php';
include_once 'File.php';
include_once 'ContributorDAO.php';
include_once 'Contributor.php';

use Model\Contributor;
use \Model\ContributorDAO;
use \Model\DbConnection;
use \Model\File;

Class ContributorDAO
{
    protected $connection;
    
    public function __construct(DbConnection $connection) {
        $this->connection = $connection;
    }
    
    public function contributorCheckLogin($contributor) {
        
            $password = filter_input(INPUT_POST, 'password');

            $request = $this->connection->prepare("SELECT id, username, password, firstname, lastname
                                                     FROM contributor
                                                    WHERE username =:username");
            $request->execute([
                'username'   => $contributor->getUsername() 
                ]);

            foreach($request as $details) {
                if ($details['username'] == $contributor->getUsername() 
                 && password_verify($password, $details['password'])
                        ) {
                        $_SESSION['username']  = $details['username'];
                }
                else {
                    throw new \Exception("This is my Exception Message");
                }
            }
    }
    
    public function buildContributorObject($username) {
        try {
            $request = $this->connection->prepare("SELECT id, firstname, lastname, email, password
                                                     FROM contributor
                                                    WHERE username =:username");
            $request->execute([
                'username'   => $username
                ]);

            $contributor = new Contributor($username);

            foreach($request as $details) {
                $contributor->setId($details['id']);
                $contributor->setFirstName($details['firstname']);
                $contributor->setLastName($details['lastname']);
                $contributor->setEmail($details['email']);
                $contributor->setPassword($details['password']); 
            }
            return $contributor;
        }
        catch (\PDOException $e) {
            echo "Error - can't access user details";
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