<?php

require "headers.php";

// Instantiate DB & connect
$database = new Database();
$db       = $database->connect();

// Instantiate dvd product
$product = new DVD($db);

// Get posted data
$data = json_decode(file_get_contents ("php://input"));
$product->setValues ($data);
$product->create ();