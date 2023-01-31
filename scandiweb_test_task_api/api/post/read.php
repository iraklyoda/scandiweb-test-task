<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once "../../config/Database.php";
    include_once "../../models/Product.php";

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate blog post object
    $product = new Product($db);

    // Blog post query
$result = $product->read();
$num = $result->rowCount();

if($num > 0) {
    $products_arr = array();
    $products_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        var_dump($row);
    }
}

// Che
