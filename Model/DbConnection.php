<?php

namespace Model;

Class DbConnection {
    
    private static $instance = null; 
    private $connection; 
    
    private $servername = "mysql:host=127.0.0.1;dbname=blogdb";
    private $username = "root";
    private $password = "";
    
    private function __construct() {
        $this->connection = new \PDO($this->servername, $this->username, $this->password);
        $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        return $this->connection;
    }

    public static function getInstance() {
        if (self::$instance == null){
            self::$instance = new DbConnection(); 
        }
        return self::$instance;
    }
    
    public function getConnection() {
        return $this->connection; 
    }
    
    public function prepare($stmt) { 
        return $this->connection->prepare($stmt); 
    }
}
?>
 

