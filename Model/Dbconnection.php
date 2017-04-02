<?php



Class Dbconnection{
    
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
?>