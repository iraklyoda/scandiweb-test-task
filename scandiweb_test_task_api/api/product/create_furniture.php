<?php

require "headers.php";

// Instantiate DB & connect
$database = new Database();
$db       = $database->connect();

// Instantiate furniture product
$product = new Furniture($db);

// Get posted data
$data = json_decode(file_get_contents ("php://input"));
$product->setValues ($data);
$product->create ();