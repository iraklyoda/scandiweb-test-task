<?php

require "headers.php";

// Instantiate DB & connect
$database = new Database();
//$database = new Database(parse_url(getenv("CLEARDB_DATABASE_URL")));
$db       = $database->connect();

// Get posted data
$data = json_decode(file_get_contents("php://input"));

if ($data->type === "DVD") {
    $product = new DVD($db);
}
if ($data->type === "Book") {
    $product = new Book($db);
}
if ($data->type === "Furniture") {
    $product = new Furniture($db);
}

if ($product ?? null) {
    $product->setValues($data);
    $product->create();
}
