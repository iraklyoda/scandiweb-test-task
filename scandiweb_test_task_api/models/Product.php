<?php
    class Product {
        // DB
        private $conn;
        private $table = 'products';

        // Product Properties
        public $id;
        public $SKU;
        public $name;
        public $price;
        public $attribute;
        public $value;
        public $unit;

        // Constructor with DB
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get Products
        public function read() {
            // Create query
            $query = 'SELECT * FROM products ORDER BY id DESC;';
            $stmt = $this->conn->prepare($query);
            // Execute query
            $stmt->execute();
            return $stmt;
        }
    }