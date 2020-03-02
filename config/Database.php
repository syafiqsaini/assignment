<?php
    class Database{
        // DB params
        private $host = 'localhost';
        private $db_name= 'usersdatabase';
        private $username = 'root';
        private $password= '123456';
        private $conn;

        // DB connect() function
        public function connect(){
            // Reset
            $this->conn = null;

            // Establish Connection
            try{
                $dsn = 'mysql:host='.$this->host.';dbname='.$this->db_name;
                $this->conn = new PDO($dsn, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                echo 'Connection Error: '.$e->getMessage();
            }

            return $this->conn;
        }
    }
?>