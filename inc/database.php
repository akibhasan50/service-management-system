<?php 

class database{
    private $dbname = "mysql:host=localhost; dbname=eservice;";
    private $dbuser = "root";
    private $dbpass = "";
    public  $conn;

    public function __construct(){
        if(!isset($this->conn)){
            try {
             $this->conn = new PDO("$this->dbname,$this->dbuser, $this->dbpass");
             $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("connection failed".$e->getMessage());
            }

        }
        
       
    }
}







;?>