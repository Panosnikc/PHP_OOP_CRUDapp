<?php
    class PropertyType {

        //DB
        private $conn;
        private $table_name = 'property_type';

        // PropertyType properties
        public $property_type_id;
        public $name;
        public $created_at;

        // Cunstructor
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get categories
        public function read() {
            // Create query, select all data
            $query = "SELECT property_type_id, name
                FROM
                  " . $this->table_name . "
                ORDER BY 
                  name";
            
            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Execute query
            $stmt->execute();

            return $stmt;
        }

        function readName() {
            // Create query
            $query = "SELECT name
                FROM " . $this->table_name . "
                WHERE property_type_id = ?
                LIMIT 0,1";

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Bind ID
            $stmt->bindParam(1, $this->property_type_id);
            // Execute query
            $stmt->execute();

			// Fetch single entry 
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            // Set properties 
            $this->name = $row['name'];
            
        }
    }
?>