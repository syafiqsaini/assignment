<?php
    class User{
        // DB purpose
        private $conn;
        private $table = 'users';

        // User properties
        public $id;
        public $name;
        public $email;
        public $created_at;

        // Construction with DB param
        public function __construct($db){
            $this->conn = $db;
        }

        // View all user function()
        public function viewUser(){
            // Create a query
            $query = 'SELECT * FROM '.$this->table.' ORDER BY name ASC';

            // Prepare statement
            $stmt = $this->conn->prepare($query);
            // Execute statement
            $stmt->execute();

            return $stmt;
        }

        // Get User by ID function()
        public function getUserById(){
            // Create a query string
            $query = 'SELECT * FROM '.$this->table.' WHERE id=:id';
            
            // Prepare statement
            $stmt = $this->conn->prepare($query);
            // Bind user name
            $stmt->bindValue(':id', $this->id);

            // Execute the query
            $stmt->execute();

            return $stmt;
        }

        // Get User function()
        public function getUser(){
            // Create a query string
            $query = 'SELECT * FROM '.$this->table.' WHERE name LIKE :name';
            
            // Prepare statement
            $stmt = $this->conn->prepare($query);
            // Bind user name
            $stmt->bindValue(':name', "$this->name%");

            // Execute the query
            $stmt->execute();

            return $stmt;
        }

        // Create User function()
        public function createUser(){
            // Create an INSERT query
            $query = 'INSERT INTO '.$this->table.' SET name=:name, email=:email';

            // Prepare the query
            $stmt = $this->conn->prepare($query);

            // Clean the data from input
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->email = htmlspecialchars(strip_tags($this->email));

            // Bind data to statement
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':email', $this->email);

            // Execute query
            if($stmt->execute()){
                return true;
            }
        }

        // Update user function()
        public function updateUser(){
            // Create an UPDATE query
            $query = 'UPDATE '.$this->table.' SET name=:name, email=:email WHERE id=:id';

            // Prepare the query
            $stmt = $this->conn->prepare($query);

            // Clean the data from input
            $this->id = htmlspecialchars(strip_tags($this->id));
            $this->name = htmlspecialchars(strip_tags($this->name));
            $this->email = htmlspecialchars(strip_tags($this->email));

            // Bind data to statement
            $stmt->bindValue(':id', $this->id);
            $stmt->bindValue(':name', $this->name);
            $stmt->bindValue(':email', $this->email);

            // Execute query
            if($stmt->execute()){
                return true;
            }

            return false;
        }
    }
?>