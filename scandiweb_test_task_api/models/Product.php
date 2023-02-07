<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

abstract class Product
{
    // DB
    protected $conn;
    protected $table = 'products';

    // Product Properties
    public $id;
    public $SKU;
    public $name;
    public $price;
    public $attribute;
    public $value;
    public $unit;

    /**
     * @return string
     */
    public function get_table(): string
    {
        return $this->table;
    }

    // Constructor with DB
    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function setValues($data)
    {
        $this->SKU = $data->SKU;
        $this->name = $data->name;
        $this->price = $data->price;
        $this->value = $data->value;
    }

    public function create()
    {
        // Create query
        $query = 'INSERT INTO ' . $this->get_table () . ' 
          SET
            SKU = :SKU,
            name = :name,
            price = :price,
            attribute = :attribute,
            value = :value,
            unit = :unit';
        $stmt = $this->conn->prepare($query);

        $this->SKU = htmlspecialchars (strip_tags ($this->SKU));
        $this->name = htmlspecialchars (strip_tags ($this->name));
        $this->price = htmlspecialchars (strip_tags ($this->price));
        $this->attribute = htmlspecialchars (strip_tags ($this->attribute));
        $this->value = htmlspecialchars (strip_tags ($this->value));
        $this->unit = $this->unit ?? "";

        // Bind Data
        $stmt->bindParam(':SKU', $this->SKU);
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':attribute', $this->attribute);
        $stmt->bindParam(':value', $this->value);
        $stmt->bindParam(':unit', $this->unit);

        try {
            $stmt->execute();
            echo json_encode(
                array('msg' => 'Product Created')
            );
            http_response_code(201);
        } catch (PDOException $e) {
            if(str_contains($e, '1062 Duplicate entry')) {
                http_response_code(422);
                echo json_encode(
                    array('msg' => 'Duplicate Sku')
                );
            } else {
                echo json_encode(
                    array('msg' => 'Product Not Created')
                );
            }
        }
    }

    // Delete Product
    public function delete() {
        // Create query
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind Data
        $stmt->bindParam(':id', $this->id);

        try {
            $stmt->execute();
            echo json_encode(
                array('msg' => 'Product Deleted')
            );
            http_response_code(200);
        } catch (PDOException $e) {
                http_response_code(422);
                echo json_encode(
                    array('msg' => 'Product Not Deleted')
                );
            }
    }
}

class ProductCollection extends Product
{
    // Get Products
    public function read()
    {
        // Create query
        $query = 'SELECT * FROM ' . $this->get_table () . ' ORDER BY id DESC;';
        $stmt  = $this->conn->prepare ($query);
        // Execute query
        $stmt->execute ();
        return $stmt;
    }
}

class DVD extends Product
{
    public $attribute = "Size";
    public $unit = "MB";
}

class Book extends Product
{
    public $attribute = "Weight";
    public $unit = "KG";
}

class Furniture extends Product
{
    public $attribute = "Dimension";
}
