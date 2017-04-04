<?php

Class Dbconnection{
    
    private static $instance = null; 
    private $connection; 
    
    private $servername = "mysql:host=127.0.0.1;dbname=blogdb";
    private $username = "root";
    private $password = "";
    
    private function __construct(){
   
    /*function getdbconnect(){*/
        
        $this->connection = new PDO($this->servername, $this->username, $this->password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connection successful"; 
        return $this->connection;
    }


    public static function getInstance() {
        if (self::$instance == null){
            self::$instance = new Dbconnection(); 
        }
        return self::$instance;
    }
    
    public function getConnection(){
        return $this->connection; 
    }
} 
 
$instance = Dbconnection::getInstance();
$connection = $instance->getConnection(); 




/*Class Dbconnection{
    
    public $servername = "mysql:host=127.0.0.1;dbname=blogdb";
    public $username = "root";
    public $password = "";
    
    function getdbconnect(){
        $connection = new PDO($this->servername, $this->username, $this->password);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully"; 
        return $connection;
    }
}
 */


?>

