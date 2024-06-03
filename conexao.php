<?php 

        class Database {

            private $host = "musa.com"; // private $host = "localhost";
            private $db_name = "MusaTeste"; // private $db_name = "MusaServer";
 
            private $username = "root"; // private $username = "root";
  
            private $password = "Mo0zie1987";  // $password = "";

            public $conn;

            public function getConnection(){
                $this->conn = null;

                try{
                   $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
                   if($this->conn->connect_error){
                        die("connection failed > " .$this->conn->connect_error);
                }

            } catch(Exception $e){
                echo "Connection error :" . $e->getMessage();
            }


            return $this->conn;


        }

    }


?>
