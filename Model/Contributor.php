<?php

namespace Model;

include_once 'Dbconnection.php';

Class Contributor {
    
    protected $id;
    protected $username;
    protected $firstName;
    protected $lastName;
    protected $email;
    protected $password;
            
    public function __construct($username, $password) {
            $this->username = $username;
            $this->password = $password;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getUsername() {
        return $this->username;
    }
    
    public function setUsername($username) {
        $this->username = $username;
    }
    
    public function getPassword() {
        return $this->password;
    }
    
    public function setPassword($password) {
        $this->password = $password;
    }
}