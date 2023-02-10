<?php

require "headers.php";

// Instantiate DB & connect
$database = new Database(parse_url(getenv("CLEARDB_DATABASE_URL")));
$db       = $database->connect();

// Instantiate dvd product
$product = new ProductCollection($db);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

foreach ($data->id as $id) {
    $product->id = $id;
    $product->delete();
}


